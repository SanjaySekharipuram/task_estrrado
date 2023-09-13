



@extends('layouts.default')
@section('content')


<div class="container">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.login.index')}}">Login</a></li>
                    
                 <li class="list-group-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.vendors')}}">Vendors</a></li>
                <li class="list-group-item">
                    <a class="nav-link active" aria-current="page" href="{{route('products.index')}}">Products</a></li>
                   <li class="list-group-item">
                        <a class="nav-link active" aria-current="page" href="{{route('stock.index')}}">Stocks</a></li>
              </ul>
</div>




@endsection