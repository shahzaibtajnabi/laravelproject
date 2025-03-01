<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
   public function adminindex(){
    return view('admindaashboard.index');
   }

   public function admincontact(){
    return view('admindaashboard.contactview');
   }
}
