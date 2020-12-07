<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;



class CustomerController extends Controller
{
    public function login()
    {
        return view('web.pages.login');
    }

    public function register()
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

        return redirect('/');

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
        $this->validate($request, [
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|max:12',
            'address' => 'required'
        ]);
    }

    //Customer Data save
    protected function customerDataSave($request)
    {
    }
}
