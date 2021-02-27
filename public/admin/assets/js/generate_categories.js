$(document).ready(function () {
    $('#cmb_cat').change(function(){
        var cat_id = $(this).val();
        $.ajax({
            url: "/admin-panel/get_sub_cat/" + cat_id ,
            dataType: 'html',
            type: 'get',
            success: function (data) {
                $('#sub_cat_cont').show();
                $('#cmb_sub_cat').html(data);
            }
        });
    });
});
