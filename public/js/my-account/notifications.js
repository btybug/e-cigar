/**
 * Created by hook on 1/9/2019.
 */

$(document).ready(function(){

    function Get_content() {
        var _this = this;

        this.myEvents = function(){

            $(".__modal").click(function(){
                let data = {id:$(this).attr("data-id"),object:$(this).attr("data-object")};
                var button=$(this);

                $.ajax({
                    url: "/my-account/notifications",
                    method: "POST",
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(responce){
                        if(!responce.error){
                            $(".modal-body").html(responce.message.content);
                            $("#notif_modal").modal();
                            button.closest('tr').attr('style','')
                        }

                    }
                })
            })

        }();

    }

    var app = new Get_content();

})