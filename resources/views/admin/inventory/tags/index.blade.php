@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Tags</h2></div>
            <div class="col-md-6 "><a class="btn btn-primary pull-right" href="#">Add new</a></div>
        </div>
        <div class="col-xs-12">
            <!-- <table id="attributes-table" class="table table-style table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Icon</th>
                    <th>Added/Last Modified Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table> -->
            <div>
            <form >
            <div class="col-md-10">
                <input type="text" id="add-new-tags" class="form-control " placeholder="Add new tags">
                </div>
                    <button type="submit" class="btn btn-submit ">Add new Tag</button>
                </div>
            </form>
            <div>
                <div class="tags">
                
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <!-- <script>
        $(function () {
            {{--$('#attributes-table').DataTable({--}}
                {{--ajax:  "{!! route('datatable_all_attributes') !!}",--}}
                {{--"processing": true,--}}
                {{--"serverSide": true,--}}
                {{--"bPaginate": true,--}}
                {{--columns: [--}}
                    {{--{data: 'id',name: 'id'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'image', name: 'image'},--}}
                    {{--{data: 'icon', name: 'icon'},--}}
                    {{--{data: 'created_at', name: 'created_at'},--}}
                    {{--{data: 'actions', name: 'actions'}--}}
                {{--]--}}
            {{--});--}}
        });

    </script> -->
    <script>
    const makeHtml = (data) => {
           return `<div class="single-tags col-md-2" style=" margin: 5px;">
                    <div class="single-tags-text">
                        <p>${data}</p>
                    </div>
                    <div class="remove-tag">
                        <i class="fa fa-times"></i>
                    </div>
                </div>`
        }
        const  makeAllHtml  =  (data) => {
            $(".tags").empty()
            data.forEach(item => {
                $(".tags").append( makeHtml(item))
             })
        }
        const firstData = JSON.parse(localStorage.getItem('tags'))
        if (firstData) {
            makeAllHtml(firstData)
        }
        
        $("form").submit(function(e){
            e.preventDefault()
            let value = $("#add-new-tags").val()
            let allData = JSON.parse(localStorage.getItem('tags'));
            if (allData === null) {
                let arr = []
                localStorage.setItem("tags" , JSON.stringify([value]));
                makeAllHtml(arr)
                return
            }
            allData.push(value)
            makeAllHtml(allData)
            localStorage.setItem("tags" , JSON.stringify(allData));

        })

        $("body").on("click", ".remove-tag", function(){
            let value = $(this).closest(".single-tags").find(".single-tags-text").text().trim()
            let allData = JSON.parse(localStorage.getItem('tags'));
            let index = allData.indexOf(value)
            allData.splice( index, 1 );
            makeAllHtml(allData)
            localStorage.setItem("tags" , JSON.stringify(allData));
        })
    </script>
@stop