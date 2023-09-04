@extends('layouts.app')

@section('content')
@foreach ($cities as $city)

    <a href="{{route('singelCity',['id'=>$city->id])}}" class="btn btn-danger mb-2">{{$city->name}}</a><br>

@endforeach
    
@endsection