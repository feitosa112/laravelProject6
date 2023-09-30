@extends('layouts.app')
@section('content')
<h4 class="display-4">Edit {{$city->city}}</h4>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif


            <form action="{{route('city.update',['id'=>$city->id])}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$city->id}}"><br>
                <input type="text" class="form-control" name="city" value="{{$city->city}}"><br>
                <input type="text" class="form-control" name="country" value="{{$city->country}}"><br>
                <input type="text" class="form-control" name="temperature" value="{{$city->currentTemperatures}}"><br>
                <button class="btn btn-warning form-control" type="submit">Update</button>

            </form>
        </div>
    </div>
</div>
    
@endsection