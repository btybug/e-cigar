@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-unstyled list-group">
                @if(count($categories))
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="#" class="d-inline-block w-100 text-center">{{ $category->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card juice-poster juice-poster--type-1 mb-5 bg-light">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <h3 class="card-title text-center mb-0 p-2 text-white">Kaliony Hit</h3>
                        <div class="img-outer card-img-outer p-4">
                            <img class="card-img-top" src="http://core.bootydev.co.uk/public/media/drive/3f44266c7fa59df324ec315e97e8579c.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-0 h-100 d-flex flex-column">
                            <div class="text-right">
                                <a href="#" class="btn btn-primary">View more</a>
                            </div>
                            <div class="pt-4 px-3 text-justify">
                                <p class="card-text mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut dignissimos earum eum eveniet ex laudantium nobis. Atque dignissimos explicabo impedit ipsum laborum modi necessitatibus obcaecati optio quia quos. Quo!</p>
                            </div>


                            <div class="row no-gutters mt-auto">
                                <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 1">
                                    <img class="img-fluid main-transition" src="https://images.pexels.com/photos/70746/strawberries-red-fruit-royalty-free-70746.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </div>
                                <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 2">
                                    <img class="img-fluid main-transition" src="https://images.pexels.com/photos/41957/banana-fruit-healthy-yellow-41957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </div>
                                <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 3">
                                    <img class="img-fluid main-transition" src="https://images.pexels.com/photos/70746/strawberries-red-fruit-royalty-free-70746.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </div>
                                <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 4">
                                    <img class="img-fluid main-transition" src="https://images.pexels.com/photos/41957/banana-fruit-healthy-yellow-41957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs d-flex" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="firstTab-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">First Tab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="secondTab-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Second Tab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="thirdTab-tab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="thirdTab" aria-selected="false">Third Tab</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="firstTab-tab">
                    first Tab
                </div>
                <div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="secondTab-tab">
                    second Tab
                </div>
                <div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="thirdTab-tab">
                    third Tab
                </div>
            </div>
        </div>
    </div>


</div>
@stop
