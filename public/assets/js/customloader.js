/**
 * Created by ken on 2017/8/5.
 */


function initurl() {
    var url = '?';
    if (typeof($('#numPicker').val()) != 'undefined') url = url +'pageSize=' + $('#numPicker').val();
    if (typeof($('.pagination .active span').text()) != 'undefined')  url = url +'&page=' + $('.pagination .active span').text();
    if (typeof($('#stylePicker').val()) != 'undefined')  url = url +"&show=" + $('#stylePicker').val();
    return url;
}

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
        var url = '?';
        if (typeof($('#numPicker').val()) != 'undefined') url = url +'pageSize=' + $('#numPicker').val();
        if (typeof($('#stylePicker').val()) != 'undefined')  url = url +"&show=" + $('#stylePicker').val();
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
