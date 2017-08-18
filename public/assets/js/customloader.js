/**
 * Created by ken on 2017/8/5.
 */


function initurl() {
    var url = '?';
    if ($('#numPicker').val()) url = url +'pageSize=' + $('#numPicker').val();
    if ($('.pagination .active span').text())  url = url +'&page=' + $('.pagination .active span').text();
    if ($('#stylePicker').val())  url = url +"&show=" + $('#stylePicker').val();
    return url;
}

//分页器 异步无刷新 支持后退

// $(document).pjax('.pagination a', '#loader', {
//     type:"GET",
//     dataType:"html",
//     scrollTo: false,
//     timeout: 2000,
// });

$(function() {
    $('body').delegate('.pagination a',"click",function (e) {
        e.preventDefault();
        $.pjax({
            type:"GET",
            dataType:"html",
            url:$(this).attr('href'),
            scrollTo: false,
            container: '#loader',
            timeout: 2000,
        });
    });


    //选项卡实现异步刷新列表数据个数
    $('#numPicker').change(function() {
        let pageSize  = $('#numPicker').val();
        let show = $('#stylePicker').val();
        let url = '?'+"pageSize=" + pageSize;
        if ($('#stylePicker').val() == 'undefined')  url = url +"&show=" + $('#stylePicker').val();
        $.pjax({
            type:"GET",
            dataType:"html",
            url:url,
            scrollTo: false,
            container: '#loader',
            timeout: 2000,
        });
    });

    //选项卡实现异步刷新列表数据个数
    $('#stylePicker').change(function() {
        $.pjax({
            type:"GET",
            dataType:"html",
            url: initurl(),
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
