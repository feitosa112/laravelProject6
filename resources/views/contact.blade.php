@extends('layouts.app')
@section('content')
<h4 class="display-4">Contact us</h4>
<div class="container">
    <div class="row">
        <div class="col-4 offset-">

            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif

            <form action="{{route('sendMsg')}}" method="POST">
                @csrf

                <input type="text" name="email" placeholder="Email" class="form-control" value="{{old('email')}}"><br>
                <input type="text" name="subject" placeholder="Subject" class="form-control" value="{{old('subject')}}"><br>
                <textarea name="message" class="form-control" placeholder="Message" id="" cols="30" rows="10">{{old('message')}}</textarea><br>
                <button class="btn btn-primary form-control" type="submit">Send</button>
            </form>
        </div>

        <div class="col-4 offset-1">
            <h5 class="display-4">Our Location</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22678.925144857574!2d17.300979585790373!3d44.72235354854545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475e10037ef43d95%3A0x4b930955a9b45eaf!2zxIxlbGluYWM!5e0!3m2!1shr!2sba!4v1693492702817!5m2!1shr!2sba" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    
        
    
</div>
    
@endsection 