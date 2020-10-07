@extends('home.base')


@section('content')
    <h1>My Cart</h1>
    <ul>

@foreach ($order as $o)
    <h1>{{$o->courses[0]->title}}</h1>
    <h2>Rs.{{$o->courses[0]->discount_price }} <del>{{$o->courses[0]->price}}</del></h2>

    <a href="">Delete</a>
@endforeach
    </ul>

@endsection