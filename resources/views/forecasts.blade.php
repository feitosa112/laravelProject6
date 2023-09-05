@extends('layouts.app')
@section('content')
<div class="container text-center">
    <a href="" class="btn btn-danger">{{$prognoze[0]->city->name}}</a><br>
@foreach ($prognoze as $temp)

<a href="" class="badge badge-info">{{$temp->temperature}}&deg;C</a><br>
    
@endforeach

<a href="{{route('allCities')}}" class="btn btn-warning">Back</a>
</div>
    
@endsection
