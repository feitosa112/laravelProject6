@extends('admin.layout')

@include('partials.navbar')

@section('title')
Search results
    
@endsection

@section('content')


@if (count($cities) == 1)

<h5 class="display-4">{{count($cities)}} result</h5>
    
@else

<h5 class="display-4">{{count($cities)}} results</h5>

@endif


<div class="container">
    <div class="row">
        
            @foreach ($cities as $city)
            
            <div class="col-4">
                
                <div class="card m-1">
                    
                    <div class="card-header">
                        <a style="color: black" href="{{route('singleCity',['city'=>$city->id]) }}" class="badge badge-danger">{{$city->name}}</a>
                    </div>
                    <div class="card-body">
                    <ul class="list-group">
                       @foreach ($city->forecast as $forecast)
                           @if ($forecast->city_id == $city->id)
                           @php
                               $boja = \App\Http\ForecastHelper::colorByTemperature($forecast->temperature);

                               $icons = \App\Http\ForecastHelper::weatherType($forecast->weatherType)
                           @endphp
                            <li>
                                <p>{{$forecast->date}}--<span style="color:{{$boja}}">{{$forecast->temperature}}</span>&deg;C--<i class="fa-solid {{$icons}}"></i></p>
                            </li>                            
                           @endif
                       @endforeach
                    </ul>
                    </div>
                    
                </div>
            </div>   

            @endforeach
    </div>
</div>
    
    
@endsection