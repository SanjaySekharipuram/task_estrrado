@extends('layouts.default')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="text-right mb-2">
                <button id="add_button" type="button" class="btn btn-primary">Add Stock</button>
                </div>
                <table class="table table-bordered" id="stocksTable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>

@include('stock.stock_modal')
    @include('stock.js')
@endsection