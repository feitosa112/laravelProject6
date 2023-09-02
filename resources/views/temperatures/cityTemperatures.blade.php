@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">

        <div class="col-2 ">
            <br>
            <a href="{{route('addCityView')}}" class="btn btn-primary float-left">Add city</a><br><br>
            <p><em>Klikom na dugme Add city mozete dodati grad za koji zelite da se prikauje temperatura</em></p>
        </div>
        <div class="col-5 offset-2">
            <h5 class="display-4">Current temperatures</h5>
            @foreach ($temperatures as $temp)
            <div class="card">
                <div class="card-header">
                    <h3>{{$temp->city}}({{$temp->country}})---{{$temp->currentTemperatures}}&deg;C</h3>
                    <a href="{{route('deleteCity',['id'=>$temp->id])}}" class="badge badge-danger">Delete</a>
                    <a href="{{route('editCity',['id'=>$temp->id])}}" class="badge badge-warning">Edit</a>
                </div>
            </div>
            <br><br>
                
            @endforeach
        </div>
        <div class="col-2">
            <br><p><em>Trenutne temperature nisu stvarne,proizvoljno su upisane u cilju vjezbe</em></p>
        </div>
    </div>
</div>
    
@endsection