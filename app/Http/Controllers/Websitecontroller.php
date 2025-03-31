<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\contact;
use App\Models\Daytime;
use App\Models\products;
use App\Models\services;
use App\Mail\Orderapprove;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Websitecontroller extends Controller
{
    public function firstview()
    {
        return view('website.layouts.index');
    }

       public function about (){
        return view('website.layouts.about');
       }
       public function services(){
        $global = services::all();
        return view('website.layouts.service',compact('global'));
       }

       public function pricing(){
        $pricing = services::all();
        return view('website.layouts.pricing',compact('pricing'));
       }
       public function apointment(){
        $apointment = services::all();
        return view('website.layouts.appointment',compact('apointment'));
       }
       public function opening(){
        $opening = Daytime::all();
        return view('website.layouts.opening',compact('opening'));
       }
       public function team(){
        return view('website.layouts.Team');
       }
       public function testimonial(){
        return view('website.layouts.testimonial');
       }
       public function Contact(){
        return view('website.layouts.contact');
       }
       public function Shopping (){
        $product = products::all();
        return view('website.layouts.Shopping',compact('product'));
       }

    // post contact
  public function storecontact(Request $request){
  $contact = new contact();
   $contact->name = $request->contact_name;
   $contact->email = $request->contact_email;
   $contact->subject = $request->contact_subject;
   $contact->message = $request->contact_message;
  $contact->save();


  return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Your message has been sent successfully!'
]);

  }

  public function cart(){
    return view('website.layouts.cart');

  }

    public function addToCart(Request $request)
    {
        // Product ka data session me store karein
        $cart = session()->get('cart', []);

        // Product ID se check karein ke pehle se exist to nahi
        $product_id = $request->id;
        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++; // Agar pehle se hai to quantity badha do
        } else {
            $cart[$product_id] = [
                "desc" => $request->desc,
                "price" => $request->price,
                "image" => $request->image,
                "quantity" => 1
            ];
        }

        // Session me cart data store karein
        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        if ($request->action == 'increase') {
            $cart[$id]['quantity'] += 1;
        } elseif ($request->action == 'decrease' && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] -= 1;
        }

        session()->put('cart', $cart);
    }

    return back();
}


///imag tap work
public function show($id)
{

    $product = products::findOrFail($id);

    // List price calculation
    $list_price = round($product->price * 1.2, 2);

    // Rating calculation
    $rating = round(mt_rand(6, 10) / 2, 1);
    $fullStars = floor($rating);
    $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
    $emptyStars = 5 - ($fullStars + $halfStar);

    // Related Products
    $relatedProducts = $product->relatedProducts;
    $productcarousel = Products::limit(8)->get();


    return view('website.layouts.productshow', compact('product', 'list_price', 'rating', 'fullStars', 'halfStar', 'emptyStars','relatedProducts','productcarousel'));
}

public function BillingPage(Request $request) {
    $data = $request->all();
    $total_price = $data['quantity'] * $data['product_price'];
    return view('website.layouts.productbooking', compact('data', 'total_price'));
}


public function store(Request $req)
{
    $validated = $req->validate([
        'customer_name' => 'required|string|max:255',
        'address' => 'required|string',
        'city' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'nullable|email|max:255',
        'order_notes' => 'nullable|string',
        'product_id' => 'required|integer',
        'product_name' => 'required|string|max:255',
        'product_desc' => 'required|string',
        'product_price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'payment_method' => 'required|in:cash_on_delivery,card',
    ]);

    $billing = new Order();
    $billing->customer_name = $req->customer_name ;
    $billing->address= $req->address;
    $billing->city= $req->city ;
    $billing->phone= $req->phone ;
    $billing->email = $req->email  ;
    $billing->order_notes = $req->order_notes ;
    $billing->product_id  = $req->product_id ;
    $billing->product_name = $req->product_name ;
    $billing->product_desc = $req->product_desc ;
    $billing->product_price = $req->product_price ;
    $billing->quantity  = $req->quantity ;
    $billing->total_price  = $req->total_price  ;
    $billing->payment_method = $req->payment_method  ;

    $billing->save();

    $Order = [
    'customer_name' =>$req->customer_name,
    'email' =>$req->email,
    'address' =>$req->address,
    'product_name'=>$req->product_name,
    'product_desc'=>$req->product_desc,
    'quantity'=>$req->quantity,
    'total_price'=>$req->total_price,
    'payment_method'=>$req->payment_method,

    ];
    Mail::to($req['email'])->send(new Orderapprove($Order));
    return redirect()->route('Shopping')->with('alert', [
    'type' => 'success',
    'message' => 'Your order has been placed successfully!'


]);
}
public function track(){
    return view('website.layouts.tracking');
}




public function trackorder(Request $request)
{
    $trackingNumber = $request->tracking_number;
    $order = Order::where('tracking_number', $trackingNumber)->first();

    if (!$order) {
        return response()->json(['error' => 'Tracking number not found.'], 404);
    }

    return response()->json(['Order' => $order]);
}
}








