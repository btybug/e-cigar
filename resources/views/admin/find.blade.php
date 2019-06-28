@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <div class="admin-find-wrapper">
        <div class="form-group row border-bottom pb-2">
            <label for="find" class="col-sm-2 col-form-label">Find</label>
            <div class="col-sm-10">
                <select name="" id="find" class="form-control">
                    <option value="">Products</option>
                    <option value="">Orders</option>
                    <option value="">Customers</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="barcode" class="col-sm-2 col-form-label">Product barcode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="barcode" placeholder="Product barcode">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="product-id" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-id" placeholder="product id">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="product-name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-id" placeholder="product name">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="product-items" class="col-sm-2 col-form-label">items</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-items" placeholder="product items">
                    </div>
                </div>
            </div>
        </div>
        <div class="find-wrapper-results mt-5">
            <h3 class="border-bottom pb-2">Results</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="row no-gutters h-100">
                            <div class="col-md-4">
                                <img src="http://drdenarobinson.com/wp-content/uploads/2018/08/bigstock-Vaping-Girl-Young-Hipster-Wom-239880340.jpg" class="card-img" alt="photo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Mongo Harmony</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet facilis fuga labore minus modi optio, quo ratione rerum veniam voluptate!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="row no-gutters h-100">
                            <div class="col-md-4">
                                <img src="https://images.fineartamerica.com/images/artworkimages/mediumlarge/1/vape-girl-renee-bruch.jpg" class="card-img" alt="photo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Mongo Harmony</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet facilis fuga labore minus modi optio, quo ratione rerum veniam voluptate!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <!-- jvectormap -->
@stop
@section('js')
@stop
