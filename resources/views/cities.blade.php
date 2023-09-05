@extends('layouts.app')

@section('content')
@foreach ($cityfor as $for)

    <a href="{{route('singelCity',['id'=>$for->id])}}" class="btn btn-danger mb-2">{{$for->name}}</a><br>

@endforeach
    
@endsection