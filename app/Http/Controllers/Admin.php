<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Category;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function addCourse(Request $req){
        $data = ["category"=>Category::all()];
        return view("admin.addCourse",$data);
    }

    public function AddCourseWork(Request $req){
        $valid = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'instructor' => 'required',
            'assignments' => 'required',
            'duration' => 'required',
    ]);
        //image works
        $filename = time() . $req->file("image")->getClientOriginalName();
        $req->file("image")->move("course",$filename,"public");

        //course insertion
        $course = new Course();
        $course->title = $req->title;
        $course->duration = $req->duration;
        $course->price = $req->price;
        $course->image = $filename;
        $course->discount_price = $req->discount_price;
        $course->assignments = $req->assignments;
        $course->instructor = $req->instructor;
        $course->category = $req->category;
        $course->save();

        return redirect()->back();
    }
}
