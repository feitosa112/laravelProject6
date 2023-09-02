@extends('layouts.app')

@section('content')
<h4 class="display-4">
    Add City
</h4>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">


            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif


            <form action="{{route('addCity')}}" method="POST">
                @csrf
                <input type="text" name="city" placeholder="City" value="{{old('city')}}" class="form-control"><br>
                <input type="text" name="country" placeholder="Country" value="{{old('country')}}" class="form-control"><br>
                <input type="text" name="temperature" placeholder="Temperature" value="{{old('temperature')}}" class="form-control"><br>
                <button class="btn btn-success form-control" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
    
@endsection