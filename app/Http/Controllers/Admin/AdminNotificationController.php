<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderNotification;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminNotificationController extends Controller
{
    public function index(Request $request)
    {
        $query = OrderNotification::with(['order', 'user'])
            ->where('type', 'new_order')
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan status baca
        if ($request->has('status') && $request->status !== 'all') {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Filter berdasarkan tanggal
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Pencarian
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%")
                  ->orWhereHas('order', function ($q) use ($search) {
                      $q->where('order_number', 'like', "%{$search}%");
                  });
            });
        }

        $notifications = $query->paginate(20)->withQueryString();

        // Statistik
        $stats = [
            'total' => OrderNotification::where('type', 'new_order')->count(),
            'unread' => OrderNotification::where('type', 'new_order')->where('is_read', false)->count(),
            'read' => OrderNotification::where('type', 'new_order')->where('is_read', true)->count(),
            'today' => OrderNotification::where('type', 'new_order')
                ->whereDate('created_at', Carbon::today())
                ->count(),
        ];

        return view('admin.notifications.index', compact('notifications', 'stats'));
    }

    public function markAsRead($id)
    {
        $notification = OrderNotification::findOrFail($id);
        $notification->markAsRead();

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi ditandai sebagai sudah dibaca'
        ]);
    }

    public function markAllAsRead()
    {
        OrderNotification::where('type', 'new_order')
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now()
            ]);

        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai sudah dibaca');
    }

    public function getUnreadCount()
    {
        $count = OrderNotification::where('type', 'new_order')
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }

    public function delete($id)
    {
        $notification = OrderNotification::findOrFail($id);
        $notification->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus');
    }
}