/**
 * Created by ken on 2017/8/5.
 */
$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    var url = $(this).attr('href');
    getJobs(url);
//                    window.history.pushState("", "", url);
});

function getJobs(url) {
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