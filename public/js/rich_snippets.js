$(function () {
    var data={};
    $('#rich-property-button').on('click', function () {
        AjaxCall('/admin/seo/rich-properties', {type: 'stock'}, success)
        // $('#rich-modal').modal()
    });

    function success(obj) {
        data=obj;
        $('#rich-modal .modal-body').empty();
        let button = $('<button/>', {class: 'btn btn-info btn-block rich-property'})
        let container = $('<div/>', {class: 'col-md-3 mb-1'})
        $.each(obj, function (k, v) {
            let b = button.clone()
            let c = container.clone()
            b.text(v.label)
            b.attr('data-key', k)
            c.append(b)
            $('#rich-modal .modal-body').append(c)

        })
        $('#rich-modal').modal()
    }


$('body').on('click', '.rich-property', function () {
    let property=data[$(this).attr('data-key')]
    let group = $('<div/>', {class: 'form-group'});
    let label = $('<label/>');
    let inputWrap = $('<div/>', {class: 'd-flex'});
    let span = $('<span/>',{
        text: 'x',
        class: 'btn btn-danger'
    });
    let input = $('<input/>', {
        type: 'text',
        class: 'form-control'
    });

    let g = group.clone();
    let l = label.clone();
    let i = input.clone();
    let iw = inputWrap.clone();
    let sp = span.clone();
    iw.append(i)
    iw.append(sp)
    l.text(property.label);
    i.attr('name', $(this).attr('data-key'));
    g.append(l, iw);
    $('.rich-body').append(g);
    $(this).remove()

});
});
// <div class="form-group">
//     <label for="exampleInputEmail1">Email address</label>
// <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
//     <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
// </div>


// let group=$('<div/>',{class:'form-group'});
// let label=$('<label/>');
// let input=$('<input/>',{
//     type: 'text',
//     class:'form-control'
// });



