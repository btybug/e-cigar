@extends('layouts.frontend')
@section('content')
<div class="container">
    <ul class="nav nav-pills nav-fill ml-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="designs-tab" data-toggle="tab" href="#designs" role="tab" aria-controls="designs" aria-selected="false">Designs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="artWork-tab" data-toggle="tab" href="#artWork" role="tab" aria-controls="artWork" aria-selected="false">Art Work</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
            <form>

                <div>
                    <h2 class="mb-3">Shipping Address</h2>
                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" aria-describedby="CompanyName" placeholder="Company Name">
                    </div>
                    <div class="form-group">
                        <label for="firstAddress">1st line Address</label>
                        <input type="text" class="form-control" id="firstAddress" aria-describedby="firstAddress" placeholder="1st line Address">
                    </div>
                    <div class="form-group">
                        <label for="secondAddress">2nd line Address</label>
                        <input type="text" class="form-control" id="secondAddress" aria-describedby="secondAddress" placeholder="2nd line Address">
                    </div>


                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <div class="tab-pane fade" id="designs" role="tabpanel" aria-labelledby="designs-tab">
            ..2..
        </div>
        <div class="tab-pane fade" id="artWork" role="tabpanel" aria-labelledby="artWork-tab">
            ..3..
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            ..4..
        </div>
    </div>
</div>
@stop