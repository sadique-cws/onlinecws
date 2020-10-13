@extends('home.base')


@section('content')

<div class="container mt-5">
    <div class="row">
        @foreach ($course as $c)
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm">
                    <a href="{{ route('singleCourse',['id'=>$c->id]) }}" class="stretched-link">
                <img src="{{ asset('course/'.$c->image)}}" alt="" class="w-100 border border-muted" style="object-fit: contain;height:220px">
                    </a>
                    <div class="card-body p-1">
                        <h2 class="h6">{{$c->title}}</h2>
                        <p class="text-muted">{{$c->instructor}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection