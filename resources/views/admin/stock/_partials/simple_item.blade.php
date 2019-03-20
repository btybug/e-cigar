<div class="basic-center basic-wall">
    <div class="row">
        <div class="col-md-12">

            @php
                $single_variation = ($model && $model->variations) ? $model->variations->first() : null;
            @endphp
            <table class="table table-style table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {!! Form::text("variations[$main_unique][name]",($single_variation) ? $single_variation->name : null,['class' => 'form-control']) !!}
                        {!! Form::hidden("variations[$main_unique][id]",($single_variation) ? $single_variation->id : null) !!}
                    </td>
                    <td>
                        {!! Form::select("variations[$main_unique][item_id]",$stockItems,($single_variation) ? $single_variation->item_id : null,['class' => 'form-control']) !!}
                    </td>
                    <td>
                        {!! (isset($item['qty'])) ? $item['qty'] : 0 !!}
                        {!! Form::hidden("variations[$main_unique][qty]",($single_variation) ? $single_variation->qty : null) !!}
                    </td>
                    <td class="w-5">
                        {!! Form::text("variations[$main_unique][price]",($single_variation) ? $single_variation->price : null,['class' => 'form-control']) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
