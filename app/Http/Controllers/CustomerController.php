<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Cart;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->first();

        //if (password_verify($request->password, $customer->password)) {
        if ($customer && Hash::check($request->password, $customer->password)) {
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->name);

            return redirect('/');
        } else {
            return redirect()->back()->with('message', 'Please enter correct information');
        }
    }
    public function register(Request $request)
    {
        $validation = $this->customerValidation($request);


        if ($validation) {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->password = bcrypt($request->password);
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();

            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->name);

            return redirect('/');
        } else {
            return redirect()->back()->with('messageReg', 'Please enter correct information');
        }
    }

    public function loginBilling()
    {
        return view('web.pages.login');
    }

    public function loginCustomer(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->first();

        //if (password_verify($request->password, $customer->password)) {
        if ($customer && Hash::check($request->password, $customer->password)) {
            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->name);

            return redirect('customer/billing');
        } else {
            return redirect()->back()->with('message', 'Please enter correct information');
        }
    }

    public function registerBilling()
    {
        return view('web.pages.register');
    }

    public function registerCustomer(Request $request)
    {
        $this->customerValidation($request);
        //$this->customerDataSave($request);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        $customerName = $customer->name;

        Session::put('customerId', $customerId);
        Session::put('customerName', $customerName);

        $data = $request->toArray();

        Mail::send('web.mail.CustomerRegistration', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Registration Confirmation');
        });

        // Mail::to($request->email)->send(new CustomerRegister($data));

        //vendor\swiftmailer\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php:269
        //$options['ssl']['verify_peer'] = FALSE;
        //$options['ssl']['verify_peer_name'] = FALSE;


        return redirect('customer/billing');
        return response()->json(['success' => 'Thanks for Registration']);
    }

    // public function sendmail(){

    // 	$data = [
    //         'subject' => 'Test Mail',
    //         'body' => 'thanks',
    //         'name' => 'Customer',
    //         'email' => 'arosh019@gmail.com'
    //     ];

    // 	Mail::send('web.mail.CustomerRegistration', $data, function ($message) use ($data) {
    //          $message->to($data['email']);
    //          $message->subject('Subject');
    //      });


    // 	return 'success';
    // }

    protected function customerValidation($request)
    {
        $validation = $this->validate($request, [
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|max:12',
            'address' => 'required'
        ]);

        return $validation;
    }

    //Customer Data save
    protected function customerLogout()
    {
        Session::forget('customerId');
        Session::forget('customerName');
        \Cart::clear();

        return redirect('/');
    }

}
