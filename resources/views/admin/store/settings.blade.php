@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mail Templates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Social APPs</a>
            </li>
        </ul>
        <div class="tab-content" style="padding-top: 30px" id="myTabContent">
            <div class="tab-pane fade show active in" id="general" role="tabpanel" aria-labelledby="general-tab">
                <form>
                    <div class="form-group">
                        <label for="Site name">Site Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Site Logo</label>
                        <input type="file" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="Site name">E-Mail Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Address">
                    </div>
                    <div class="form-group">
                        <label for="Site name">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="Site name">1st line address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="Site name">2nd line address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="inputState">City</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Country</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Site name">Post Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Code">
                    </div>
                    <div class="form-group">
                        <label for="Site name">Meta Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Store">
                    </div>
                    <div class="form-group">
                        <label for="Site name">Meta Tag Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="My Store">
                    </div>
                    <div class="form-group">
                        <label for="Site name">Meta Tag Keywords</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Meta Tag Keywords">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
        </div>
    </div>
@stop
@section('js')

@stop