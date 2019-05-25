$(document).ready(function() {

    $('select[name="allsize"]').on('change', function(){
        var allsizeId = $(this).val();
        if(allsizeId) {
            $.ajax({
                url: '/spesificsize/get/'+allsizeId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="spesificsize"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="spesificsize"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="spesificsize"]').empty();
        }

    });

});