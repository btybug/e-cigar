@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">
            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                @include('frontend.my_account._partials.left_bar')
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit"
                                class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">
                            {!! __('logout') !!}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="profile-inner-pg-right-cnt">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                    <div class="row flex-lg-row flex-column-reverse">
                        <div class="col-lg-9">
                            <div class="account--order-review-wrap">
                                <ul class="nav nav-tabs mb-3" id="myTabReview" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="reviewItem1-tab" data-toggle="tab" href="#reviewItem1" role="tab" aria-controls="reviewItem1" aria-selected="true">Item 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="reviewItem2-tab" data-toggle="tab" href="#reviewItem2" role="tab" aria-controls="reviewItem2" aria-selected="false">Item 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="reviewItem3-tab" data-toggle="tab" href="#reviewItem3" role="tab" aria-controls="reviewItem3" aria-selected="false">Item 1</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="reviewItem1" role="tabpanel" aria-labelledby="reviewItem1-tab">
                                            <div class="account--order-review-first-tab">
                                                <h1 class="text-uppercase title font-18 text-gray-clr font-main-bold">You're reviewing:smok nord kit</h1>
                                                <p class="font-14">How do you rate this product?<span class="text-danger">*</span></p>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-uppercase"></th>
                                                            <th class="text-uppercase text-center">1 start</th>
                                                            <th class="text-uppercase text-center">2 starts</th>
                                                            <th class="text-uppercase text-center">3 starts</th>
                                                            <th class="text-uppercase text-center">4 starts</th>
                                                            <th class="text-uppercase text-center">5 starts</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Overall Rating</td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <input type="radio" name="rating">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <input type="radio" name="rating">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <input type="radio" name="rating">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <input type="radio" name="rating">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <input type="radio" name="rating">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nicknameField">Nickname <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nicknameField" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="summaryField">Summary <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="summaryField" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Review <span class="text-danger">*</span></label>
                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <button class="btn btn-primary">
                                                    Save
                                                </button>

                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="reviewItem2" role="tabpanel" aria-labelledby="reviewItem2-tab">2</div>
                                    <div class="tab-pane fade" id="reviewItem3" role="tabpanel" aria-labelledby="reviewItem3-tab">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}


    </main>
@stop
