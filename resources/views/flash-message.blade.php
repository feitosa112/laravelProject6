{{-- PORUKE KOJE SE ISPISUJU NAKON ODREDJENIH AKCIJA I KOJE TRAJU DO PRVOG OSVJEZENJA STRANICE,SADRZANE U with() --}}

@if ($message = Session::get('addProduct'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('deleteProduct'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('sendMsg'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('update'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('addCity'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('deleteCity'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('updateCity'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('insertTemp'))
<div class="col-4 offset-8">
    <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
</div>
   
@endif

@if ($message = Session::get('searchNull'))
<div class="col-4 offset-8">
    <div class="alert alert-danger" role="alert">
        {{$message}}
      </div>
</div>
   
@endif