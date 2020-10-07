@extends('home.base')


@section('content')
    

    <h1>{{$course->title}}</h1>
    <h6>{{$course->description}}</h6>

<a href="{{ route('addCart', ['c_id'=>$course->id])}}">join Now</a>


@endsection