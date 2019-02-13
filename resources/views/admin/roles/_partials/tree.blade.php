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
                            <li><input type="checkbox"><label class="tree-toggle nav-header">{!! $permission['name'] !!}</label>
                                <ul class="nav nav-list tree">
                                    @foreach($permission['children'] as $child)
                                        <li><a href="#">{!! $child['name'] !!}</a><input type="checkbox"></li>
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