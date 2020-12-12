<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function billingDetails()
    {
        $customer = Customer::find(Session::get('customerId'));

        return view('web.pages.order.billing', compact('customer'));
    }


    public function billingsave(Request $request, $id)
    {
        if (Shipping::find($id) == null) {
            $shipping = new Shipping;
            $this->billingInfo($shipping, $request);
        } else {
            $shipping = Shipping::find($id);
            $this->billingInfo($shipping, $request);
        }

        Session::put('shippingId', $shipping->id);

        return redirect('customer/payment');
    }

    protected function billingInfo($shipping, $request)
    {
        $shipping->name = $request->name;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();
    }
}
