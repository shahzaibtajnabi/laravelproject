<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class Websitecontroller extends Controller
{
    public function firstview (){
        return view('website.layouts.index');
       }

       public function about (){
        return view('website.layouts.about');
       }
       public function services(){
        return view('website.layouts.service');
       }

       public function pricing(){
        return view('website.layouts.Pricing');
       }
       public function apointment(){
        return view('website.layouts.appointment');
       }
       public function opening(){
        return view('website.layouts.opening');
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
    'message' => 'Success! Your contact message was sent.'
]);



  }

}
