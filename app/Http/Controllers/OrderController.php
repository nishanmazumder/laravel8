<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App;
use App\Models\OrderDetails;
use App\Models\Shipping;
use PDF;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected function order()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customerId', '=', 'customers.id')
            ->join('shippings', 'orders.shippingId', '=', 'shippings.id')
            ->join('order_details', 'orders.shippingId', '=', 'order_details.id')
            ->select('orders.id', 'orders.created_at', 'orderStatus', 'customers.name', 'order_details.productQty', 'order_details.productprice', 'shippings.address')
            ->orderBy('orders.id', 'desc')
            ->get();

        return view('admin.pages.order.order-list', compact('orders'));
        //return dd($orders);
    }

    protected function orderView($id)
    {
        return view('invoice.invoice');
    }

    protected function pdfView($id)
    {
        $order = Order::find($id);
        $shipping = Shipping::where('id', $order->shippingId)->first();
        $orderDetails = OrderDetails::where('orderId', $order->id)->get();

        //$pdf = App::make('dompdf.wrapper');
        //  $pdf = PDF::loadView('invoice.invoice', compact('order'));
        // return $pdf->stream();
        //return $pdf->download('invoice.pdf');

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('invoice.invoice', compact('order','shipping','orderDetails'))->stream();

       
            
       

        //return dd($orderDetails);
    }
}
