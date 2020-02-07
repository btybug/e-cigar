@extends('layouts.admin')
@section('content-header')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/get-app-token">Get Application Token</a></li>
                <li><a href="/get-user-token">Get User Token</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1>Get User Token Accepted</h1>
<p>State <em>This value was returned from the API and should match what was originally sent.</em></p>
<pre>{{$state}}</pre>
<p>Code <em>This value was sent to the API to be exchanged for an access token.</em></p>
<pre>{{$code}}</pre>
<p>The eBay API returned the HTTP status code:<em>{{$statusCode}}</em></p>
@if($statusCode==200)
<p>Access Token</p>
<pre>{{$accessToken}}</pre>
<p>Token Type</p>
<pre>{{$tokenType}}</pre>
<p>Expires In</p>
<pre>{{$expiresIn}}</pre>
<p>Refresh Token</p>
<pre>{{$refreshToken}}</pre>
<p><a class="btn btn-primary" href="/refresh-user-token?refresh-token={{$refreshToken}}" role="button">Use the above refresh token to generate a new token</a></p>
@else
<p class="bg-danger">eBay returned the following error: {{$error}} : {{$errorDescription}}</p>
@endif
@stop
