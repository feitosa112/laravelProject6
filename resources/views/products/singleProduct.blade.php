@include('layouts.app')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h4 class="display-4">
                {{$product->name}}
            </h4>
            <h5>Price:{{$product->price}} km</h5>
            <h5>Amount:{{$product->amount}}</h5>
            <p>Description:{{$product->description}}</p>
        </div>
    </div>
</div>