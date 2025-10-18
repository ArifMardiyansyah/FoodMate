<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // Sample order history data - in a real app, this would come from database
        $orderHistory = [
            [
                'id' => 'ORD-001',
                'date' => '2024-01-15',
                'status' => 'completed',
                'total' => 45000,
                'items' => [
                    ['name' => 'Nasi Uduk', 'quantity' => 2, 'price' => 15000],
                    ['name' => 'Es Teh', 'quantity' => 1, 'price' => 15000]
                ]
            ],
            [
                'id' => 'ORD-002',
                'date' => '2024-01-12',
                'status' => 'completed',
                'total' => 32000,
                'items' => [
                    ['name' => 'Mie Goreng', 'quantity' => 1, 'price' => 12000],
                    ['name' => 'Pecel Lele', 'quantity' => 1, 'price' => 20000]
                ]
            ],
            [
                'id' => 'ORD-003',
                'date' => '2024-01-10',
                'status' => 'completed',
                'total' => 18000,
                'items' => [
                    ['name' => 'Sate Ayam', 'quantity' => 1, 'price' => 18000]
                ]
            ]
        ];

        return view('history', compact('orderHistory'));
    }
}