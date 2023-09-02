@extends('layouts.app')

@section('content')
<h5 class="display-4">All products</h5>
{{-- PRIKAZ TABELE SA PROIZVODIMA --}}
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">

            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">View product</th>
                    <th scope="col">Action</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($allProducts as $product)
                    
                        <tr>
                            <th>{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->amount}}</td>
                            <td><a href="{{route('viewProduct',['id'=>$product->id])}}" class="badge badge-primary badge-sm">View product</a></td>

                            <td>
                                @if (Auth::check() && $product->userID == Auth::user()->id)
                                    <a href="{{route('deleteProduct',['id'=>$product->id])}}" class="badge badge-danger badge-sm">Obrisi</a>
                                    <a href="{{route('editView',['id'=>$product->id])}}" class="badge badge-warning badge-sm">Edituj</a>
                                @endif
                                
                            </td>
                        </tr>
                    
                    
                        
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection