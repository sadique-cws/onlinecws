@extends('admin.base')


@section('content')

<ul>
    @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
    
</ul>
<form action="{{ route("addCourseWork") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title">
        <textarea type="text" name="description"></textarea>
        <input type="text" name="duration">
        <input type="text" name="price">
        <input type="text" name="discount_price">
        <input type="text" name="instructor">
        <input type="text" name="assignments">
        <input type="file" name="image">
        <select name="category">
            @foreach ($category as $cat)
        <option value="{{ $cat->id }}"><?= $cat->title;?></option>
            @endforeach
        </select>
        <input type="submit" name="send">

    </form>
@endsection