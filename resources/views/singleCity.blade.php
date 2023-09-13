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
                
                <h4>Today:</h4>
                <ul class="list-group">
                    
                        
                        @php
                            $boja = \App\Http\ForecastHelper::colorByTemperature($city->today->temperature);

                            $icons = \App\Http\ForecastHelper::weatherType($city->today->weatherType)
                        @endphp
                         
                             <p>{{$city->today->date}}--<span style="color:{{$boja}}">{{$city->today->temperature}}</span>&deg;C--<i class="fa-solid {{$icons}}"></i></p>
                                                     
                        
                   
                 </ul>
            </div>
        </div>
    
</div>

    
@endsection