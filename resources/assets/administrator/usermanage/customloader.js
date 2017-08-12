/**
 * Created by ken on 2017/8/5.
 */
//异步分页
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    var url = $(this).attr('href');
    getData(url);
//                    window.history.pushState("", "", url);
});
$(function() {
    //选项卡实现异步刷新列表数据个数
    $('#numPicker').change(function() {
        let url = window.location.href;
        let currentValue = $(this).val();

        jQuery("#load").show("slow");
        $.get(url+'?'+'pageSize='+currentValue)
            .then(function (response) {
                jQuery("#load").hide();
                console.log(currentValue);
                $('#loader').html(response);
            }).catch(function (error) {
            console.log(error);
        });
    });

})
//取数据
function getData(url) {
    jQuery("#load").show("slow");
    $.ajax({
        url: url
    }).done(function (data) {
        jQuery("#load").hide();
        $('#loader').html(data);
    }).fail(function () {
        alert('Jobs could not be loaded.');
    });
}