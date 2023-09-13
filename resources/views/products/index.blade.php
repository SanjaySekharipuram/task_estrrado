@extends('layouts.default')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="text-right mb-2">
                <button id="add_button" type="button" class="btn btn-primary">Add Product</button>
                </div>
                <table class="table table-bordered" id="productsTable">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
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

@include('products.products_modal')
    @include('products.js')
@endsection