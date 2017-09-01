/**
 * Created by ken on 2017/8/5.
 */


function initurl() {
    var url = '?';
    if (typeof($('#numPicker').val()) != 'undefined') url = url + 'pageSize=' + $('#numPicker').val();
    if (typeof($('.pagination .active span').text()) != 'undefined') url = url + '&page=' + $('.pagination .active span').text();
    if (typeof($('#stylePicker').val()) != 'undefined') url = url + "&show=" + $('#stylePicker').val();
    return url;
}

$(function () {
    $('body').delegate('.pagination a', "click", function (e) {
        e.preventDefault();
        $.pjax({
            type: "GET",
            dataType: "html",
            url: $(this).attr('href'),
            scrollTo: false,
            container: '#loader',
            timeout: 2000,
        });
    });
    $('#modal-contact').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        formAction = button.attr('data-url');
    })

    $("#message-submit").click(function (e) {
        var taken = document.querySelector("#token").getAttribute("content");
        var subject = $('#modal-contact').find('#subject').val();
        var message = $('#modal-contact').find('#message-text').val();
        jQuery("#load").show();
        $.ajax({
            type: "POST",
            data: {_token: taken, subject: subject, message: message},
            url: formAction,
            timeout: 2000,
        }).then((response) => {
            jQuery("#load").hide();
            $('#modal-contact').modal('hide');
        });
    });

    $('#modal-contact').on('hidden.bs.modal', function (e) {
        $('#modal-contact').find('#subject').val('');
        $('#modal-contact').find('#message-text').val('');
    })


    //选项卡实现异步刷新列表数据个数
    $('#numPicker').change(function () {
        var url = '?';
        if (typeof($('#numPicker').val()) != 'undefined') url = url + 'pageSize=' + $('#numPicker').val();
        if (typeof($('#stylePicker').val()) != 'undefined') url = url + "&show=" + $('#stylePicker').val();
        $.pjax({
            type: "GET",
            dataType: "html",
            url: url,
            scrollTo: false,
            container: '#loader',
            timeout: 2000,
        });
    });


    //选项卡实现异步刷新列表数据个数
    $('#stylePicker').change(function () {
        $.pjax({
            type: "GET",
            dataType: "html",
            url: initurl(),
            scrollTo: false,
            container: '#loader',
            timeout: 2000,
        });
    });

})

$(document).on('pjax:send', function () {
    $('#load').show()
})
$(document).on('pjax:complete', function () {
    $('.selectpicker').selectpicker('refresh');
    $('#load').hide()
})
