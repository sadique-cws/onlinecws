@extends('home.base')


@section('content')
    <h1>My Cart</h1>
    <ul>
        @foreach ($order as $o)
            <li><a href="" class="">{{$o->id}}</a></li>
        @endforeach
    </ul>

@endsection