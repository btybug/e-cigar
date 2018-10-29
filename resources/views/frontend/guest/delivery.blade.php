@extends('layouts.frontend')
@section('content')
   <div class="container">
       <div class="bg-white p-5 shadow-sm">
           <div class="row justify-content-center mb-5">
               <div class="col-md-4">
                   <div class="form-group">
                       <label for="country">Select Country</label>
                       {!! Form::select('country',$countries,null,['class'=>'form-control','id'=>'country']) !!}
                   </div>
               </div>

               <div class="col-md-4">
                   <div class="form-group">
                       <label for="city">Select City</label>
                       <select id="city" disabled readonly="true" class="form-control">
                           <option selected>Choose...</option>
                       </select>
                   </div>
               </div>

           </div>
           <div class="row">
               <div class="col-md-12">
                   <h4 class="text-center mb-5">Shipping method based on order amount</h4>

                   {{--first condition--}}
                   <ul class="row justify-content-center mb-5 pl-0 bg-light py-4">
                       <li class="col-md-4">
                           <h5>If order is 1-50</h5>
                       </li>
                       <li class="col-md-4">
                           <table class="table table-bordered">
                               <tr>
                                   <td>Local Mail</td>
                                   <td>1-3 days</td>
                                   <td>10USD</td>
                               </tr>
                               <tr>
                                   <td>DHL</td>
                                   <td>1 Day</td>
                                   <td>15USD</td>
                               </tr>
                           </table>
                       </li>
                   </ul>

                   {{--second condition--}}
                   <ul class="row justify-content-center mb-5 pl-0 bg-light py-4">
                       <li class="col-md-4">
                           <h5>If order is more than 50</h5>
                       </li>
                       <li class="col-md-4">
                           <table class="table table-bordered">
                               <tr>
                                   <td>DHL</td>
                                   <td>1 day</td>
                                   <td>free</td>
                               </tr>
                           </table>
                       </li>
                   </ul>
               </div>

           </div>
       </div>

   </div>
@stop