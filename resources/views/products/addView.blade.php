@include('layouts.app')
<h4 class="display-4">Add product</h4>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            @if ($errors->any())
            @foreach($errors->all() as $error)

            <p style="color: red">{{$error}}</p>
    
            @endforeach
            @endif
                
            
            <form action="{{route('add')}}" method="POST">
                @csrf
                <input type="text" name="name" value="{{old('name')}}" placeholder="Name" class="form-control"><br>
                <input type="number" name="price" value="{{old('price')}}" placeholder="Price" class="form-control"><br>
                <input type="number" name="amount" value="{{old('amount')}}" placeholder="Amount" class="form-control"><br>
                <textarea name="description" class="form-control" placeholder="Description" id="" cols="30" rows="10">{{old('description')}}</textarea>
                <button type="submit"  class="btn btn-info form-control">Save</button>
            </form>
        </div>
    </div>
</div>
