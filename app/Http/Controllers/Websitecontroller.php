<?php

namespace App\Http\Controllers;

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



}
