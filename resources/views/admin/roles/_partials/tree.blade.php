@php
    $permissions=config('permissions');
@endphp

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="well no-padding">
                <div>
                    <ul class="nav nav-list nav-menu-list-style">
                        @foreach($permissions as $permission)
                            <li>
                                <div class="nav-menu-wrap tree-toggle nav-header">
                                    <input type="checkbox">
                                    <label class="">{!! $permission['name'] !!}</label>
                                </div>
                                <ul class="nav nav-list tree">
                                    @foreach($permission['children'] as $child)
                                        <li><input type="checkbox"><a href="#">{!! $child['name'] !!}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>