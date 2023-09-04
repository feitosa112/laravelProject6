@extends('layouts.app')
@section('content')
<div class="container text-center">
    <a href="" class="btn btn-danger">{{$city->name}}</a><br>
@foreach ($temperature as $temp)

<a href="" class="badge badge-info">{{$temp->temperature}}&deg;C</a><br>
    
@endforeach

<a href="{{route('allCities')}}" class="btn btn-warning">Back</a>
</div>
    
@endsection
