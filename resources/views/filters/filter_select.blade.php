<div class="filters-select-wizard" id="{!! $uniqId !!}" data-type="{!! $type !!}" data-toggle="modal"
     data-group="{!! $group !!}" data-name="{!! $name.(($is_multiple)?'[]':null) !!}"
     data-multiple="{!! $is_multiple !!}" data-action="{!! $category->id !!}">

    {!! Form::open(['id'=>'filter-form']) !!}
    {!! Form::hidden('type',$type) !!}
    {!! Form::hidden('group',$group) !!}
    {!! Form::hidden('category_id', $category->id) !!}
    <div class="row flex-column justify-content-center mb-2">
        <div class="col-sm-6">
            <div class="form-group row">
                <label class="col-md-4 col-xs-12">{!! $category->name !!}</label>
                <div class="col-md-8">
                    {!! Form::select('filters[]',[null=>'Select Parent']+$category->filters()->get()->pluck('name','id')->toArray(),null,['class'=>'form-control filter-select','required'=>true]) !!}
                </div>

            </div>
            <div class="filter-children-selects row flex-column">

            </div>
        </div>

    </div>
    {!! Form::close() !!}
    <div class="releted__products-panel">
        <div>

            <div class="product-body">
                <div class="get-all-attributes-tab filter-children-items">

                </div>
            </div>

        </div>
    </div>
</div>
@push('javascript')
    <script>
        (function () {

//event default
            const eventInitialDefault = (ev) => {
                ev.preventDefault();
                ev.stopImmediatePropagation();
            };

//counts qty for group
            const new_qty = function(group) {
                let qty = 0;
                group.closest('.product-single-info_row').find('.product-qty').each(function() {
                    qty += Number($(this).val());
                });
                return qty;
            };

//set select2 max limit
            const select2MaxLimit = (section, limit) => {
                section.select2({maximumSelectionLength:
                Number(limit)
                - Number(new_qty(section))
                + section.closest('.product-single-info_row').find('input[name="qty"]').length
                });
            };

//product-count-minus event callback
            const handleProductCountMinus = (minus_button, section, type, limit) => {
                const input = $(minus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

                Number(input.val()) > 1 && input.val(Number(input.val()) - 1);
                new_qty(section);

                if(type === 'select') {
                    select2MaxLimit(section, limit);
                }

                const price = minus_button.closest('[data-price]').attr('data-price');
                minus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);
            };

//product-count-plus event callback
            const handleProductCountPlus = (plus_button, section, type, limit) => {
                const input = $(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

                new_qty(section);
                Number(input.val()) < Number(limit) - Number(new_qty(section)) +
                Number($(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val()) && input.val(Number(input.val()) + 1);
                new_qty(section);
                if(type === 'select') {
                    select2MaxLimit(section, limit);
                }

                const price = plus_button.closest('[data-price]').attr('data-price');
                plus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);
            };

//select handle function
            const selectHandle = (ev, id, selectElementId) => {
                fetch("/products/get-variation-menu-raw", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    credentials: "same-origin",
                    body: JSON.stringify({id: id, selectElementId: selectElementId})
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (json) {
                        $(ev.target).closest('.product-single-info_row').find('.filter-children-items').append(json.html)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            };

//unselect handle function
            const unselectHandle = (select, id, limit) => {
                select.closest('.filters-select-wizard').find(`.menu-item-selected[data-id="${id}"]`).remove();
                setTimeout(function() {
                    new_qty(select);
                    select2MaxLimit(select, limit)
                }, 0);
            };



            $('.filters-select-wizard').each(function() {
                console.log($(this).attr('data-group'), '$(this).attr(\'data-group\')');
                $(`[data-group="${$(this).attr('data-group')}"]`).on('change', function () {
                    let self = $(this)
                    let parentRow = $(this).closest('.product-single-info_row')
                    let data = parentRow.find('form#filter-form').serialize();

                    AjaxCall("/filters",
                        data,
                        function (res) {
                            if (!res.error) {
                                console.log(res);
                                switch (res.type) {
                                    case 'filter':
                                        parentRow.find('.filter-children-items').empty();
                                        parentRow.find('.filter-children-selects').html(res.filters);
                                        break;
                                    case 'items':
                                        parentRow.find('.filter-children-selects').html(res.filters);
                                        parentRow.find('.filter-children-items').children().length === 0 && parentRow.find('.filter-children-items').html(res.items_html);
                                        console.log(444444)
                                        parentRow.find(".product--select-items").select2({
                                            multiple: self.closest('[data-limit]').attr('data-limit')=== '1' ? false : true,
                                            placeholder: "Select Products",
                                        });
                                        parentRow.find(".product--select-items").find('option[value=""]').remove();
                                        break;
                                }
                            }
                        });
                });

                $(`[data-group="${$(this).attr('data-group')}"]`).on('select2:select', '.product--select-items', function (e) {
                    const id = e.params.data.id;
                    const selectElementId = $(e.params.data.element).attr('data-select2-id');
                    selectHandle(e, id, selectElementId);
                });

                $(`[data-group="${$(this).attr('data-group')}"]`).on('select2:unselect', '.product--select-items', function (e) {
                    const limit = $(this).closest('[data-limit]').attr('data-limit');
                    unselectHandle($(this), e.params.data.id, limit)
                });

                $(`[data-group="${$(this).attr('data-group')}"]`).on('click', '.product-count-minus', function(ev){
                    eventInitialDefault(ev);
                    const limit = $(this).closest('[data-limit]').attr('data-limit');
                    const row = $(this).closest('.product-single-info_row');
                    const select = row.find('.product--select-items');
                    handleProductCountMinus($(this), select, 'select', limit);
                });

                $(`[data-group="${$(this).attr('data-group')}"]`).on('click', '.product-count-plus', function(ev){
                    eventInitialDefault(ev);
                    const limit = $(this).closest('[data-limit]').attr('data-limit');
                    const row = $(this).closest('.product-single-info_row');
                    const select = row.find('.product--select-items');
                    handleProductCountPlus($(this), select, 'select', limit);
                });

                $(`[data-group="${$(this).attr('data-group')}"]`).on('click', '.delete-menu-item', function() {
                    const limit = $(this).closest('[data-limit]').attr('data-limit');

                    if($(this).closest('.filters-select-wizard').length > 0) {
                        const $this = $(this);
                        const s_id = $this.attr('data-el-id');
                        console.log(s_id, 'selectElementId');
//                    console.log($(`.select2-selection__choice[data-select2-id="${s_id}"].select2-selection__choice__remove`), '$(`.select2-selection__choice[data-select2-id="${s_id}"].select2-selection__choice__remove`)');
                        $(`.select2-selection__choice[data-select2-id="${s_id}"].select2-selection__choice__remove`).click();
                        $(this).closest('.filters-select-wizard').find(`option[data-select2-id="${s_id}"]`);
                        const deleted = $this.closest('.menu-item-selected').attr('data-id');
                        const values = $(this).closest('.filters-select-wizard').find('.product--select-items').val().filter((value) => value !== deleted);
                        $(this).closest('.filters-select-wizard').find('.product--select-items').val(values).trigger('change.select2');
                        $this.closest('.menu-item-selected').remove();
                        new_qty($(this).closest('.filters-select-wizard').find('.product--select-items'));
                        select2MaxLimit($(this).closest('.filters-select-wizard').find('.product--select-items'), limit);
                    }
                });
            });

        })()

    </script>
@endpush
