@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mail-tab" data-toggle="tab" href="#mail" role="tab" aria-controls="mail" aria-selected="false">Mail Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Social APPs</a>
            </li>
        </ul>
        <div class="tab-content tab-content-store-settings" id="myTabContent">
            <div class="tab-pane fade active in" id="general" role="tabpanel" aria-labelledby="general-tab">
                <form>
                    <div class="form-group">
                        <label for="SiteName">Site Name</label>
                        <input type="text" class="form-control" id="SiteName" aria-describedby="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="siteLogo">Site Logo</label>
                        <input type="file" class="form-control" id="siteLogo">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter E-Mail Address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="firstAddress">1st line address</label>
                        <input type="text" class="form-control" id="firstAddress" aria-describedby="firstAddress" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="secondAddress">2nd line address</label>
                        <input type="text" class="form-control" id="secondAddress" aria-describedby="secondAddress" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postCode">Post Code</label>
                        <input type="text" class="form-control" id="postCode" aria-describedby="postCode" placeholder="Enter Post Code">
                    </div>
                    <div class="form-group">
                        <label for="metaTitle">Meta Title</label>
                        <input type="text" class="form-control" id="metaTitle" aria-describedby="metaTitle" placeholder="Your Store">
                    </div>
                    <div class="form-group">
                        <label for="metaTagDesc">Meta Tag Description</label>
                        <input type="text" class="form-control" id="metaTagDesc" aria-describedby="metaTagDesc" placeholder="My Store">
                    </div>
                    <div class="form-group">
                        <label for="metaTagKeywords">Meta Tag Keywords</label>
                        <input type="text" class="form-control" id="metaTagKeywords" aria-describedby="metaTagKeywords" placeholder="Meta Tag Keywords">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-tab">
                <form>
                    <div class="form-group">
                        <label for="MailEngine">Mail Engine</label>
                        <input type="email" class="form-control" id="MailEngine" aria-describedby="MailEngine" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="MailParameters">Mail Parameters</label>
                        <input type="text" class="form-control" id="MailParameters" aria-describedby="MailParameters" placeholder="Mail Parameters">
                    </div>
                    <div class="form-group">
                        <label for="SMTPHostname">SMTP Hostname</label>
                        <input type="text" class="form-control" id="SMTPHostname" aria-describedby="SMTPHostname" placeholder="SMTP Hostname">
                    </div>
                    <div class="form-group">
                        <label for="SMTPUsername">SMTP Username</label>
                        <input type="text" class="form-control" id="SMTPUsername" aria-describedby="SMTPUsername" placeholder="SMTP Username">
                    </div>
                    <div class="form-group">
                        <label for="SMTPPassword">SMTP Password</label>
                        <input type="password" class="form-control" id="SMTPPassword" aria-describedby="SMTPPassword" placeholder="SMTP Password">
                    </div>
                    <div class="form-group">
                        <label for="SMTPPort">SMTP Port</label>
                        <input type="password" class="SMTPPort" id="SMTPPort" aria-describedby="SMTPPort" placeholder="SMTP Port">
                    </div>
                    <div class="form-group">
                        <label for="SMTPTimeout">SMTP Timeout</label>
                        <input type="password" class="form-control" id="SMTPTimeout" aria-describedby="SMTPTimeout" placeholder="SMTP Timeout">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table table-responsive table--store-settings">
                    <tbody>
                    <tr>
                        <td>
                            <label for="ShippingZones">Shipping to</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <select id="ShippingZones" class="form-control">
                                    <option selected>Shipping Zones</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <label for="TaxRate">Tax Rate</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <select id="TaxRate" class="form-control">
                                    <option selected>Tax Rate</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </td>
                        <td colspan="4" class="text-right">
                            <button type="button" class="btn btn-danger">-</button>
                        </td>
                    </tr>
                    <tr class="bg-my-light-blue">
                        <td>Shipping Zone - <span>Armenia</span></td>
                        <td colspan="5">Tax Rate - <span>ArmeniaVaT20</span></td>
                    </tr>
                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th>Time</th>
                    </tr>
                    <tr>
                        <td rowspan="3">
                            <input type="number" min="1" max="5" class="form-control table--store-settings_input-inline">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control table--store-settings_input-inline">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-danger">-</button>
                        </td>
                        <td rowspan="2" class="text-right">
                            <button type="button" class="btn btn-primary">+</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <select id="dhl" class="form-control">
                                    <option selected>DHL</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-danger">-</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                            <button type="button" class="btn btn-primary">+</button>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="3">
                            <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                            <span>To</span>
                            <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
                        </td>
                        <td>
                            <select id="PosType" class="form-control">
                                <option selected>Normal Post</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                3 days
                            </span>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-danger">-</button>
                        </td>
                        <td rowspan="2" class="text-right">
                            <button type="button" class="btn btn-primary">+</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select id="dhl" class="form-control">
                                <option selected>DHL</option>
                                <option>...</option>
                            </select>
                        </td>
                        <td>
                            <span class="form-control">
                                5
                            </span>
                        </td>
                        <td>
                            <span class="form-control">
                                1 day
                            </span>
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-danger">-</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <button type="button" class="btn btn-primary">+</button>
                        </td>
                    </tr>
                    <tr class="bg-my-light-blue">
                        <td>Shipping Zone - <span>Armenia</span></td>
                        <td colspan="5">Tax Rate - <span>ArmeniaVaT20</span></td>
                    </tr>
                    <tr class="bg-my-light-pink">
                        <th>Order Amount</th>
                        <th>Courier</th>
                        <th>Cost</th>
                        <th>Time</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop

@section('js')

@stop


