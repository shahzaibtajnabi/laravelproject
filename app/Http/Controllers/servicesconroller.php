<?php

namespace App\Http\Controllers;

use App\Models\Daytime;
use App\Models\products;
use App\Models\services;
use App\Models\Bannerchange;
use Illuminate\Http\Request;

class servicesconroller extends Controller
{
 // global services create
 public function global(){
    $global =  services::all();
    return view('admindaashboard.services',compact('global'));
 }

 public function globalpost(Request $req) {
    // Validate incoming request
    $req->validate([
        'name'  => 'required|string|max:255',
        'Desc'  => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Create new service entry
    $global = new Services();
    $global->name = $req->name;
    $global->Desc = $req->Desc;
    $global->price = $req->price;
    $global->heading1 = $req->heading1;
    $global->heading2 = $req->heading2;
    $global->heading3 = $req->heading3;
    $global->heading4 = $req->heading4;
    $global->heading5 = $req->heading5;


    // Handle Image Upload
    if ($req->hasFile('image')) {
        $file = $req->file('image');
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('uploads');
        $file->move($destinationPath, $filename);

        // Save only relative path
        $global->image = 'uploads/' . $filename;
    }
    $global->save();


    return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Success! Services added successfully!'
    ]);


 }


public function deleteid($id){
$service = services::find($id);
$service ->delete();

return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Service is Deleted'

]);
}
//  global-time/Day
public function Time(){
    $global = Daytime::all();
    return view('admindaashboard.Time',compact('global'));
}
public function globaltime(request $req){
$day = new Daytime();
$day->name = $req->name;
$day->Desc = $req->Desc;

$day->day1 = $req->day1;
$day->time1 = $req->time1;


$day->day2 = $req->day2;
$day->time2 = $req->time2;


$day->day3 = $req->day3;
$day->time3 = $req->time3;
$day->save();
return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Success! Time added successfully!'

]);
}

public function timedelete($id){
 $delete = Daytime::find($id);
 $delete->delete();
 return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Time Deleted🧐'

]);
}

    // Creating  Products
public function products(){
    $products = products::all();
    return view('admindaashboard.products',compact('products'));
}

public function productspost(request $req){
    $req->validate([
        'name'  => 'required|string',
        'desc'  => 'required|string',
        'price' => 'required|numeric',
        'color' => 'required|string',
        'size'  => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Image required
    ]);

 $products = new products();
 $products->name = $req->name;
 $products->desc = $req->desc;
 $products->price = $req->price;
 $products->color = $req->color;
 $products->size = $req->size;

    // Handle Image Upload
    if ($req->hasFile('image')) {
        $file = $req->file('image');
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('uploads');
        $file->move($destinationPath, $filename);

        // Save only relative path
        $products->image = 'uploads/' . $filename;
    }
    $products->save();
return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Success! Products added successfully!'

]);
}

public function productsdelete($id){
    $delete = products::find($id);
    $delete->delete();
    return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Product Deleted🧐'

    ]);
}
public function banner(){
    $banner = Bannerchange::all();
    return view('admindaashboard.Bannerchange',compact('banner'));
}

public function bannerchange(Request $req){
    $req->validate([
        'service_name'  => 'required|string',
        'service_description'  => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Image required
    ]);

 $banner = new Bannerchange();
 $banner->service_name = $req->service_name;
 $banner->service_description = $req->service_description;

    // Handle Image Upload
    if ($req->hasFile('image')) {
        $file = $req->file('image');
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
        $destinationPath = public_path('uploads');
        $file->move($destinationPath, $filename);

        // Save only relative path
        $banner->image = 'uploads/' . $filename;
    }
    $banner->save();
return redirect()->back()->with('alert', [
    'type' => 'success',
    'message' => 'Success! Banner added successfully!'

]);
}


public function bannerdelete($id){
    $delete = Bannerchange::find($id);
    $delete->delete();
    return redirect()->back()->with('alert', [
        'type' => 'success',
        'message' => 'Banner Deleted🧐'

    ]);
}




}