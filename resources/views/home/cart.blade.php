@extends('home.base')


@section('content')
    <h1>My Cart</h1>
    <ul>

@foreach ($order as $o)
    <h1>{{$o->courses[0]->title}}</h1>
    <h2>Rs.{{$o->courses[0]->discount_price }} <del>{{$o->courses[0]->price}}</del></h2>
        <?php $id = $o->courses[0]->id;?>
    <a href="{{ route('removeCart',['c_id'=>$id])}}">Delete</a>

    @endforeach
    </ul>


    <hr>
<h1>Total Amount: {{ $getTotal }}</h1>
<h2>Total Saving : {{ $getTotal - $getDiscountTotal }}</h2>
<h1>Total Discount Amount {{ $getDiscountTotal }}</h1>

@if ($couponStatus)
    
<form action="{{ route('addCoupon')}}" method="POST">
    @csrf
    <input type="text" name="code">
    <input type="submit" name="send">
</form>
@endif

@endsection

