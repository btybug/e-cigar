@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="my-account--selects">
            <div class="simple_select_wrapper">
                <select id="accounts--selects"
                        class="select-2 select-2--no-search main-select main-select-2arrows not-selected arrow-dark"
                        style="width: 100%">
                    <option value="{!! route('my_account') !!}">Account</option>
                    <option value="{!! route('messages') !!}">Notifications</option>
                    <option value="{!! route('my_account_favourites') !!}">Favorites</option>
                    <option value="{!! route('my_account_orders') !!}">Orders</option>
                    <option value="{!! route('my_account_address') !!}">Address</option>
                    <option value="{!! route('my_account_tickets') !!}">Tickets</option>
                    <option value="{!! route('my_account_referrals') !!}">Referals</option>
                    <option value="{!! route('my_account_special_offers') !!}">Special Offers</option>
                    <option value="">Address</option>
                </select>
                {{--<select id="accounts"--}}
                {{--class="select-2 select-2--no-search main-select main-select-2arrows products-filter-wrap_select not-selected arrow-dark" style="width: 100%">--}}
                {{--<option value="{!! route('my_account') !!}">Account</option>--}}
                {{--<option>Brandos</option>--}}
                {{--<option>Eleaf</option>--}}
                {{--</select>--}}
            </div>
        </div>
        <div class="d-flex">
            {{--@include('frontend._partials.left_bar')--}}

            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                @include('frontend.my_account._partials.left_bar')
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit" class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">Logout</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>

            <div class="profile-inner-pg-right-cnt">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                    <div class="row">
                        <div class="col-lg-9">
                            <div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Sorry!</strong> There were more problems with your equest.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {!! Form::model(null,['url' => route('my_account_tickets_new_post'), 'id' => 'ticket_form','files' => true]) !!}
                                {!! Form::hidden('id',null) !!}


                                {{--<div class="form-group row mb-5">--}}
                                {{--<div class="col-md-5">--}}
                                {{--<h5>--}}
                                {{--<label for="selectAddress" class="control-label text-muted">Default Shipping Address</label>--}}
                                {{--</h5>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-5 offset-md-2 d-flex">--}}
                                {{--<select class="form-control edit-address" name="address_book"><option value="2" selected="selected">Oshakan Dprocakanneri 19</option><option value="3">56 lolol</option><option value="4">132 Berryhill Crescent</option></select>--}}
                                {{--<button type="button" class="nav-link nav-link--new-address btn ntfs-btn address-book-new rounded-0 ml-4">--}}
                                {{--+ Add New--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}



                                    <div class="form-group mb-5">
                                        {{Form::label('category_id', 'Category',['class' => 'text-muted font-22'])}}

                                        <div class="row">
                                            <div class="col-md-5 col-8">
                                                {!! Form::select('category_id',[null=>'Select Category']+$categories,null,
                                                            ['style' => 'width:100%', 'class' => 'form-control select-2 select-2--no-search main-select main-select-2arrows checkout-form_select','id'=> 'category']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="border py-3 px-4">
                                    <div class="form-group">
                                        <div class="status-wall wall">
                                            <div class="row form-group">
                                                {{Form::label('subject', 'Subject',['class' => 'col-md-2 col-sm-3'])}}
                                                <div class="col-md-10 col-sm-9">
                                                    {!! Form::text('subject',null,['class'=>'form-control checkout-form_input-text']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group " id="category-related">

                                        </div>
                                        <div class="status-wall wall">
                                            <div class="row form-group">
                                                {{Form::label('summary', 'Summary',['class' => 'col-md-2 col-sm-3'])}}
                                                <div class="col-md-10 col-sm-9">
                                                    {!! Form::textarea('summary',null,['class'=>'form-control checkout-form_input-text','cols'=>30,'rows'=>2]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label class=" col-md-2 col-sm-3">Attachments</label>
                                            <div class="col-md-10 col-sm-9">
                                                {!! Form::file('attachments[]',['multiple' => true]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right btn-save">
                                        {!! Form::submit('Save',['class' => 'btn ntfs-btn rounded-0']) !!}
                                    </div>
                                </div>



                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>

            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}

        </div>
    </main>
@stop

@section('css')
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
@stop

@section('js')
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="/public/admin_theme/blog_new.js"></script>
    <script src="/public/js/tiket.js"></script>

@stop
