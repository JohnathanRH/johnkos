<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupancy;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans Configuration
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function checkout(Occupancy $occupancy)
    {
        $uniqueOrderId = $occupancy->id . '-' . time();
        $params = [
            'transaction_details' => [
                'order_id' => $uniqueOrderId,
                'gross_amount' => $occupancy->kamar->price,
            ],
            'customer_details' => [
                'first_name' => $occupancy->tenant->name,
                'email' => $occupancy->tenant->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', compact('occupancy', 'snapToken'));

    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $order = Order::where('invoice_number', $request->order_id)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $transactionStatus = $request->transaction_status;
        if ($transactionStatus == 'settlement' || $transactionStatus == 'capture') {
            $order->update(['payment_status' => 'paid']);
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $order->update(['payment_status' => 'failed']);
        } elseif ($transactionStatus == 'pending') {
            $order->update(['payment_status' => 'pending']);
        }

        return response()->json(['message' => 'Callback handled successfully']);
    }

}
