/**
 * Created by ken  on 2017/7/25.
 */
const posturl =$("#btn1").data('stuff')[0].posturl;
const title = $("#btn1").data('stuff')[0].title;
const type = $("#btn1").data('stuff')[0].type;
const swal = require('sweetalert2');
// CommonJS
$("#myForm").submit(function (event) {
    event.preventDefault();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, '+title+ ' it!',
    }).then(function () {
        var formData = new FormData($("#myForm")[0]);
        $.ajax({
            type: type,
            url: posturl,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                swal({
                        title: title,
                        text: 'Your infomation has been '+ title +"d",
                        type: 'success',
                    }
                ).then(function () {
                    window.location.reload();
                })
            },
            error: function (error) {
                swal(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                ).then(function () {
                    window.location.reload();
                })
            }
        });
    })

});




