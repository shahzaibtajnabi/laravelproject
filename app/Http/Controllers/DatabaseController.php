<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    function getCustomerView(){
        return view('customers');
    }

    function storeCustomers(Request $request){
        $customer = new customers();

        //Column to Form Values
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;

        $customer->save();
        return redirect()->back()->with('success', 'Customer Registered');
    }
}
