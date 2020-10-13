@extends('home.base')


@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="h3">My Cart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">

    @if (count($orderitem) > 0)
        
    <ul class="list-unstyled">
        @foreach ($orderitem as $o)
        <?php $id = $o->courses[0]->id;?>

        <li class="media mb-3">
        <img src="{{ asset("course/".$o->courses[0]->image)}}" class="mr-3 w-25" alt="...">
          <div class="media-body">
            <h5 class="mt-0 mb-1">{{$o->courses[0]->title}}</h5>
            <h2>Rs.{{$o->courses[0]->discount_price }} <del>{{$o->courses[0]->price}}</del></h2>
            <a href="{{ route('removeCart',['c_id'=>$id])}}" class="btn btn-danger btn-sm">Delete</a>
        </div>
        </li>
    @endforeach
    </ul>
</div>
<div class="col-lg-3">
    <div class="list-group">
        <div class="list-group-item">Total Amount: <span class="text-dark float-right">{{ $getTotal }}</span></div>
        <div class="list-group-item">Total Saving: <span class="text-dark float-right">{{  $getTotal - $getDiscountTotal }}</span></div>
        @if ($order->coupon!=NULL)
            <div class="list-group-item bg-success text-white">
                <div class="small"><u>Coupon applied</u></div>
                Total Coupon Discount: 
                <span class="text-white float-right">100</span>
                
            <div class="lead">
            <span class="badge badge-dark badge-pill">START10 <a href="{{ route("removeCoupon")}}" class="text-white">&times;</a></span>
            </div>  
            </div>
        @endif
        <div class="list-group-item">Total Payable: <span class="text-dark float-right">{{ $getDiscountTotal }}</span></div>
    </div>
    <!-- coupon work-->
    @if ($order->coupon==NULL)
    <form action="{{ route('addCoupon')}}" method="POST" class="mt-2 d-flex">
        @csrf
        <input type="text" name="code" class="form-control">
        <input type="submit" name="send" class="btn btn-danger">
    </form>
    @endif
    <br>
    <div class="row no-gutters">
        <div class="col mr-1"><a href="" class="btn btn-success btn-block">Go Back</a></div>
        <div class="col"><a href="{{ route("checkout")}}" class="btn btn-warning btn-block">Checkout</a></div>
    </div>

    
</div>
</div>
</div>

@else
    <h1>Cart is empty</h1>
@endif

@endsection

