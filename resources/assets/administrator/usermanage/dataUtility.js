const swal = require('sweetalert2');
const axios = require('axios');
$(document).ready(function () {
    $('body').delegate(".btn-danger","click",function (e) {
        e.preventDefault();
        datadelete($('.btn-danger').attr('href'));
    })
})
function datadelete(url) {
    let pageSize  =$('#numPicker').val();
    let page = $('.pagination .active span').text();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: function () {
            return new Promise(function (resolve, reject) {
                axios.delete(url+'?'+'pageSize='+pageSize+'&page='+page).then((response) => {
                    $('#loader').html(response.data);
                    resolve(response);
                }).catch((error) => {
                    console.log("destroy error", error);
                    reject("Adminitrator:Failed! Or Some Wrong!");
                });
            })
        }
    }).then((response) => {
        jQuery("#load").hide();
        swal({
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            type: 'success'
        });
    })
}
//Mark功能实现
$(document).ready(function () {
    $('.mark').click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let value =  $(this).text();
        let taken = document.querySelector("#token").getAttribute("content");
        let pageSize  =$('#numPicker').val();
        let page = $('.pagination .active span').text();
        jQuery("#load").show();
        $.ajax({
            method: "POST",
            url: url,
            data: { status: value ,_token: taken ,pageSize: pageSize, page: page}
        }).done(function (data) {
            jQuery("#load").hide();
            $('#loader').html(data);
        }).fail(function () {
            alert('Jobs could not be loaded.');
        });
    })
})