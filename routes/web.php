<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderFeedbackController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect('/menu');
    });

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/{product:slug}', [MenuController::class, 'show'])->name('menu.show');

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle']);

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/unread', [NotificationController::class, 'getUnread']);
    Route::get('/notifications/count', [NotificationController::class, 'getCount']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);

    Route::get('/history', [HistoryController::class, 'index']);
    Route::post('/history/{id}/confirm', [HistoryController::class, 'confirmOrder'])->name('history.confirm');

    Route::get('/order/completed', [OrderFeedbackController::class, 'show'])->name('order.completed');
    Route::post('/order/feedback', [OrderFeedbackController::class, 'submit'])->name('order-feedback.submit');

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
    Route::post('/cart/remove-item', [CartController::class, 'removeItem']);
    Route::get('/cart/count', [CartController::class, 'getCartCount']);

    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/checkout/process', [CartController::class, 'processCheckout']);
    
    // Midtrans Payment Routes
    Route::post('/payment/midtrans/create-token', [MidtransController::class, 'createSnapToken'])->name('payment.midtrans.token');
    Route::get('/payment/midtrans/finish', [MidtransController::class, 'finish'])->name('payment.midtrans.finish');
    Route::get('/payment/midtrans/unfinish', [MidtransController::class, 'unfinish'])->name('payment.midtrans.unfinish');
    Route::get('/payment/midtrans/error', [MidtransController::class, 'error'])->name('payment.midtrans.error');

    // API Routes for real-time updates
    Route::prefix('api')->group(function () {
        Route::get('/orders/check-updates', [\App\Http\Controllers\Api\OrderStatusController::class, 'checkUpdates']);
        Route::get('/orders/{orderId}/status', [\App\Http\Controllers\Api\OrderStatusController::class, 'getOrderStatus']);
        Route::get('/orders/all', [\App\Http\Controllers\Api\OrderStatusController::class, 'getAllOrders']);
    });

    // Admin Routes (Protected by admin middleware)
    Route::prefix('admin')->middleware('admin')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Notification Management
        Route::get('/notifications', [AdminNotificationController::class, 'index'])->name('admin.notifications.index');
        Route::post('/notifications/{id}/mark-read', [AdminNotificationController::class, 'markAsRead'])->name('admin.notifications.mark-read');
        Route::post('/notifications/mark-all-read', [AdminNotificationController::class, 'markAllAsRead'])->name('admin.notifications.mark-all-read');
        Route::get('/notifications/unread-count', [AdminNotificationController::class, 'getUnreadCount'])->name('admin.notifications.unread-count');
        Route::delete('/notifications/{id}', [AdminNotificationController::class, 'delete'])->name('admin.notifications.delete');
        
        // Order Management
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
        Route::post('/orders/{id}/confirm-payment', [OrderController::class, 'confirmPayment'])->name('admin.orders.confirm-payment');
        Route::post('/orders/{id}/reject-payment', [OrderController::class, 'rejectPayment'])->name('admin.orders.reject-payment');
        Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
        
        // Product Management
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        Route::post('/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggle-status');
        
        // Stock Management
        Route::get('/stock', [StockController::class, 'index'])->name('admin.stock.index');
        Route::post('/stock/{product}/update', [StockController::class, 'updateStock'])->name('admin.stock.update');
        Route::post('/stock/{product}/toggle-availability', [StockController::class, 'toggleAvailability'])->name('admin.stock.toggle');
        Route::post('/stock/{product}/add', [StockController::class, 'addStock'])->name('admin.stock.add');
        Route::post('/stock/{product}/reduce', [StockController::class, 'reduceStock'])->name('admin.stock.reduce');
        Route::post('/stock/{product}/reset', [StockController::class, 'resetStock'])->name('admin.stock.reset');
        Route::get('/stock/report', [StockController::class, 'report'])->name('admin.stock.report');
        Route::get('/stock/{product}/{date}', [StockController::class, 'getStock'])->name('admin.stock.get');
    });
});

// Midtrans Notification Handler (outside auth middleware)
Route::post('/payment/midtrans/notification', [MidtransController::class, 'handleNotification'])->name('payment.midtrans.notification');
