const swal = require('sweetalert2');
const axios = require('axios');
$(document).ready(function () {
    $('body').delegate(".btn-danger","click",function (e) {
        e.preventDefault();
        datadelete($('.btn-danger').attr('href'));
    })
})
function datadelete(url) {
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
                axios.delete(url).then((response) => {
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