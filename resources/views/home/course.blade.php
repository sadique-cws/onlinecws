@extends('home.base')


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5">
                <img src="{{ asset('course/'.$course->image)}}" alt="" class="w-100">
                </div>
                <div class="col-lg-7">
                    <h2>{{$course->title}}</h2>
                    <p class="small">{{$course->description}}</p>
                    <a href="{{ route('addCart', ['c_id'=>$course->id])}}" class="btn btn-success btn-lg">join Now</a>
                </div>
            </div>
        </div>

        


@endsection