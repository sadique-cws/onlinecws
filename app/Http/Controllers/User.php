<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Coupon;


use Auth;
use Illuminate\Http\Request;
class User extends Controller
{
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
            $order = Order::create(['user_id'=> $user_id]);
        }
        
        $oi = OrderItem::firstOrCreate([
            'course_id' => $course->id,
            'user_id' => $user_id,
            'ordered' =>false,
            'order_id' => $order->id
        ]);
        
        $req->session()->flash('msg', "this course Added in your cart");
        return redirect("cart");
    }


    private function get_total_amount(){
        $user_id = Auth::id();
        $order = Order::where(array(["ordered",false],["user_id",$user_id]))->first();

        $order = Order::find($order->id)->orderitem;
        $total = 0;

        foreach($order as $o){
            $total += $o->courses[0]->price;
        }
        return $total;
    }
    
    private function get_discount_amount(){
        $user_id = Auth::id();
        $order = Order::where(array(["ordered",false],["user_id",$user_id]))->first();

        $order = Order::find($order->id)->orderitem;
        $total = 0;

        foreach($order as $o){
            $total += $o->courses[0]->discount_price;
        }
        return $total;
    }
    public function cart(Request $req){
        $user_id = Auth::id();

        $order = Order::where(array(["ordered",false],["user_id",$user_id]))->first();
        $couponStatus = false;
        
        if($order==null){
            
            $req->session()->flash('msg', "cart is empty");
            return redirect("/");

        }
        else{
            $order = Order::find($order->id)->orderitem;
        
        return view("home/cart",[
            "order"=>$order,
            "getTotal"=>$this->get_total_amount(),
            "getDiscountTotal"=>$this->get_discount_amount(),
            "couponStatus" => $couponStatus
            ]);
        }
    }

    public function removeFromCart(Request $req,$c_id){

        $course = Course::find($c_id);
        
        //if not course match
        if($course==null){
            $req->session()->flash('msg', "something went wrong");
            return redirect()->back();
        }

        //check order
        $user_id = Auth::id();
        $order = Order::where(array(array("user_id",$user_id),array("ordered",FALSE)))->first();

        $oi = OrderItem::where(array(
            ['course_id', $course->id],
            ['user_id' , $user_id],
            ['ordered' ,false],
            ['order_id' , $order->id]
        ))->first();

        if($oi!=null):
            $oi->delete();
            $req->session()->flash('msg', "this course remove successfully from your cart");
        else:
            $req->session()->flash('msg', "this course not found in db for delete");
        endif;


        
        $req->session()->flash('msg', "this course Added in your cart");
        return redirect("cart");
        

    }

    public function addCoupon(Request $req){
            $user_id = Auth::id();
            $order = Order::where(array(array("user_id",$user_id),array("ordered",FALSE)))->first();

            $req->validate(
                ['code' => 'required']
            );

           $coupon =  Coupon::where(array(["code",$req->code],["status",true]))->first();

           if($coupon==null){
                $req->session()->flash('msg', "coupon is invalid or expire");
           }
           else{
                $order->coupon = $coupon->id;
                $order->save();
                $req->session()->flash('msg', "Coupon added successfully");

           }
        return redirect("cart");

        
    }

    public  function checkout(Request $req){
        $user_id = Auth::id();
        $order = Order::where(array(array("user_id",$user_id),array("ordered",FALSE)))->first();
        $orderItem = Order::find($order->id)->orderItem;

        $order->ordered = True;
        $orderItem->map(function ($oi){
            $oi->ordered = True;
            $oi->save();
        });
        $order->save();

        return redirect("/");
    

    }


    
}