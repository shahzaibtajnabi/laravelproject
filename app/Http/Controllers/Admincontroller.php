<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\contact;
use App\Models\services;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
   public function adminindex(){
    if(Auth::check()){
        return view('admindaashboard.index');

    }
    else{
        return redirect()->route('login');
    }
   }

   public function admincontact(){
  if(Auth::check()){
    $contactview = contact::all();
    return view('admindaashboard.contactview ',compact('contactview'));

  }
  else{
    return redirect()->route('login');
}

}



   public function sendAppoinment(Request  $req){

  $Appoinment = new Appoinment();
 $Appoinment->name = $req->name;
 $Appoinment->email = $req->email;
 $Appoinment->date = $req->date;
 $Appoinment->time = $req->time;
 $Appoinment->service = $req->service;
 $Appoinment->save();

 return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Appointment booked successfully!'

]);
}

 public function Appoin(){
  if(Auth::check()){
    $lalo =  Appoinment::all();
    return view('admindaashboard.Appoinment',compact('lalo'));
  }
  else{
    return redirect()->route('login');
}

 }


 public function deleteid($id){
    $Appoin = Appoinment::find($id);

    $Appoin->delete();



    return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Appointment Deleted'

    ]);
     }


     public function updateAppoinment(Request $request, $id)
{
    // Validate only the status field
    $validatedData = $request->validate([
        'status' => 'required|in:pending,approve,reject,Picked_Up,Delivered',
    ]);

    // Find the courier and update only the status
    $courier = Appoinment::find($id);
    $courier->update(['status' => $validatedData['status']]);
    $courier->save();

    // Redirect or return response
       return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Success! Appoinment status updated successfully!'
    ]);
}


public function approveview(){
        if(Auth::check()){
        // Retrieve all couriers with status 'pending'
        $approve = Appoinment::where('status', 'approve')->get();
        return view('admindaashboard.Approve', compact('approve'));

          }
          else{
            return redirect()->route('login');
        }

    }

    public function rejectview(){

        if(Auth::check()){
               // Retrieve all couriers with status 'pending'
        $reject = Appoinment::where('status', 'reject')->get();
        return view('admindaashboard.Reject', compact('reject'));

              }
              else{
                return redirect()->route('login');
            }

    }



  ///booking-product work
  public function booking()
  {
      if(Auth::check()){
        $booking = Order::with('product')->get(); // Ensure eager loading
        return view('admindaashboard.bookingview', compact('booking'));
       }
       else{
         return redirect()->route('login');
     }

  }
 public function bookingdelete($id){
    $booking = Order::find($id);
    $booking->delete();
    return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Success! Booking Deleted!'
    ]);

 }


 public function updatebooking(Request $request, $id)
 {

     // Validate the request
     $validatedData = $request->validate([
         'Ostatus' => 'required|in:pending,approve,reject',
     ]);

     // Find the booking or return 404 error
     $booking = Order::findOrFail($id);

     // Update status
     $booking->update(['Ostatus' => $validatedData['Ostatus']]);

     // Flash success message
     return redirect()->back()->with('alert', [
         'type' => 'success',
         'message' => 'Success! Booking status updated successfully!'
     ]);
 }


public function approvebook(){

    if(Auth::check()){
        // Retrieve all couriers with status 'pending'
    $approvebook = Order::where('Ostatus', 'approve')->get();
    return view('admindaashboard.Approvebooking', compact('approvebook'));

       }
       else{
         return redirect()->route('login');
     }

}

public function rejectbook(){


    if(Auth::check()){
   // Retrieve all couriers with status 'pending'
   $rejectbook = Order::where('Ostatus', 'reject')->get();
   return view('admindaashboard.Rejectbooking', compact('rejectbook'));

       }
       else{
         return redirect()->route('login');
     }

}

public function Record(){
    if(Auth::check()){
        $user = User::all();
    return view('admindaashboard.user',compact('user'));

            }
            else{
              return redirect()->route('login');
          }

}







}
