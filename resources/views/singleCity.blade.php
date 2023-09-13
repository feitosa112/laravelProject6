@extends('admin.layout')
@section('title')
SingleCity
    
@endsection
@include('partials.navbar')

@section('content')

<div class="container text-center m-auto">
    
        <div class="card">
            <div class="card-header">
                <h4 class="display-4">{{$city->name}}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($city->forecast as $forecast)
                        @if ($forecast->city_id == $city->id)
                        @php
                            $boja = \App\Http\ForecastHelper::colorByTemperature($forecast->temperature);

                            $icons = \App\Http\ForecastHelper::weatherType($forecast->weatherType)
                        @endphp
                         
                             <p>{{$forecast->date}}--<span style="color:{{$boja}}">{{$forecast->temperature}}</span>&deg;C--<i class="fa-solid {{$icons}}"></i></p>
                                                     
                        @endif
                    @endforeach
                 </ul>
            </div>
        </div>
    
</div>

    
@endsection