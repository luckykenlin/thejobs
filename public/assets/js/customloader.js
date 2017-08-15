/**
 * Created by ken on 2017/8/5.
 */

var pageSize  =$('#numPicker').val();
var page = $('.pagination .active span').text();
var url = window.location.href;

//分页器 异步无刷新 支持后退
$(document).pjax('.pagination a', '#loader', {
    type:"GET",
    dataType:"html",
    scrollTo: false,

});

$(function() {
    //选项卡实现异步刷新列表数据个数
    $('#numPicker').change(function() {
        let url = window.location.href;
        let currentValue = $(this).val();
        $.pjax({
            type:"GET",
            dataType:"html",
            url: '?'+'pageSize='+currentValue ,
            scrollTo: false,
            container: '#loader'
        });

    });
})

$(document).on('pjax:send', function() {
    $('#load').show()
})
$(document).on('pjax:complete', function() {
    $('#load').hide()
})





//异步分页
// $(document).on('click', '.pagination a', function (e) {
//     e.preventDefault();
//
//     var url = $(this).attr('href');
//     getData(url);
// });

//取数据
// function getData(url) {
//     jQuery("#load").show("slow");
//     $.ajax({
//         url: url
//     }).done(function (data) {
//         jQuery("#load").hide();
//         $('#loader').html(data);
//     }).fail(function () {
//         alert('Jobs could not be loaded.');
//     });
// }
