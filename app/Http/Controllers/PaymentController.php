<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

class PaymentController extends Controller
{

    public function customerPayment(){
        return view('web.pages.order.payment');
    }


    public function paymentConfirm(Request $request){
        $paymentType = $request->payment_type;

        if ($paymentType=='Cash'):

            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('total');
            $order->save();

            $payment = new Payment();
            $payment->orderId = $order->id;;
            $payment->paymentType = $paymentType;
            $payment->save();

            $items = \Cart::getContent();
            foreach($items as $item){
                $orderDetails = new OrderDetails();
                $orderDetails->orderId = $order->id;
                $orderDetails->productId = $item->id;
                $orderDetails->productName = $item->name;
                $orderDetails->productprice = $item->price;
                $orderDetails->productQty =  $item->quantity;
                $orderDetails->save();
            }

            \Cart::clear();

            return redirect('/');

        elseif ($paymentType=='Paypal'):
            return 'Paypal';
        else:
            return 'bKash';
        endif;
        
        //return redirect('customer/payment');
        return 'success';

        //dd(Session::get('customerId'),Session::get('shippingId'),Session::get('total'));
    }
}
