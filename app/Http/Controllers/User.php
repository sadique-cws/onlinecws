<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\OrderItem;
use App\Models\Order;


use Auth;
use Illuminate\Http\Request;
class User extends Controller{
    public function index(){
        $data = ["course"=>Course::all()];
        return view("home.homepage",$data);
    }

    public function course(Request $req,$id){
        $data = ["course"=>Course::find($id)];
        return view("home.course",$data);
    }

    public function addToCart(Request $req,$c_id){
        $course = Course::find($c_id);
        
        //if not course match
        if($course==null){
            $req->session()->flash('msg', "something went wrong");
            return redirect()->back();
        }

        //check order
        $user_id = Auth::id();
        $order = Order::where(array(array("user_id",$user_id),array("ordered",FALSE)))->first();

        if($order == null){
            //order creation
            $o = Order::create(['user_id'=> $user_id]);
            //orderitem creation
            $oi = OrderItem::create([
                'user_id' => $user_id,
                'course_id' => $course->id,
                'ordered' =>false
            ]);
    }
    else{
        $oi = OrderItem::create([
            'course_id' => $course->id,
            'user_id' => $user_id,
            'ordered' =>false
        ]);
    }
        $req->session()->flash('msg', "this course Added in your cart");
        return redirect("cart");
    }
 
    public function cart(Request $req){
        $user_id = Auth::id();

        return $order = Order::find(1)->orderitem;
    }


    
}