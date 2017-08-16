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
    timeout: 2000,
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
            container: '#loader',
            timeout: 2000,
        });

    });
})

$(document).on('pjax:send', function() {
    $('#load').show()
})
$(document).on('pjax:complete', function() {
    $('#load').hide()
})
