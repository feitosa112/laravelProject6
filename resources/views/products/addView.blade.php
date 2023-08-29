@include('layouts.app')
<h4 class="display-4">Add product</h4>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            @if ($errors->any())
            @foreach ($errors as $error)
            <p style="color: red">{{$error}}</p>
                
            @endforeach
                
            @endif
                
            
            <form action="{{route('add')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name" class="form-control"><br>
                <input type="number" name="price" placeholder="Price" class="form-control"><br>
                <input type="number" name="amount" placeholder="Amount" class="form-control"><br>
                <button type="submit"  class="btn btn-info form-control">Save</button>
            </form>
        </div>
    </div>
</div>
