@php
    $permissions=config('permissions');
@endphp
@foreach($permissions as $key=>$permission)
    <div class="panel panel-default panel-create-role">
        <div class="panel-heading">
            <div class="user">{!! $key !!}</div>
            <div>
                <input id="has-access" type="checkbox">
                <label for="has-access">Has access</label>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Create</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permission as $item )
                    <tr>

                        <td>{!! $item['name'] !!}</td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach