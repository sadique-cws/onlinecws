@extends('home.base')


@section('content')
<h1>List of courses</h1>
    <ul>
        @foreach ($course as $c)
             <li><a href="{{ route('singleCourse',['id'=>$c->id]) }}" class="">{{$c->title}}</a></li>
        @endforeach
    </ul>
@endsection