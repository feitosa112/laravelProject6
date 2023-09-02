@extends('layouts.app')

@section('content')
<h4 class="display-4">
    Edit product <em style="color: greenyellow">{{$product->name}}</em>
</h4>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif

            <form action="{{route('update',['id'=>$product->id])}}" method="POST">
                @csrf

                <input type="hidden" value="{{$product->id}}" name="id"><br>
                <input type="text" value="{{$product->name}}" name="name" class="form-control"><br>
                <input type="number" value="{{$product->price}}" name="price" class="form-control"><br>
                <input type="number" value="{{$product->amount}}" name="amount" class="form-control"><br>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea><br>
                <button type="submit" class="btn btn-warning form-control">Update</button>

            </form>
        </div>
    </div>
</div>
    
@endsection