@extends('admin.layout')
@section('content')



<div class="container">

    <div class="row">
        <div class="col-5 offset-2">
            <p><b>Please input temperature and choose city --->>></b></p>
        </div>
        <div class="col-3 offset-1">
            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif
            <form action="{{route('insertTemp')}}" method="POST">
                @csrf
                <select name="city_id" class="form-select">
                    @foreach (\App\Models\CityForecastModel::all() as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select><br>
                <input type="text" name="temperature" class="form-control" placeholder="Please input temperature"><br>
                <button class="btn btn-success btn-sm">Save</button>
            </form><hr>
        </div>
    </div>
    
    <div class="row">
        @foreach (\App\Models\CityForecastModel::all() as $city)
            <div class="col-4">
                <div class="card m-1">
                    <div class="card-header">
                        <a style="color: black" href="" class="badge badge-danger">{{$city->name}}</a>
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
                                <p>{{$forecast->date}}--<span style="color:{{$boja}}">{{$forecast->temperature}}</span>&deg;C--<i class="fa-regular {{$icons}}"></i></p>
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
