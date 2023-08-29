@extends('layouts.app')

@section('content')
<h5 class="display-4">All products</h5>
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
                            <td>
                                <a href="" class="badge badge-danger badge-sm">Obrisi</a>
                                <a href="" class="badge badge-warning badge-sm">Edituj</a>

                            </td>
                        </tr>
                    
                    
                        
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection