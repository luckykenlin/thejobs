/**
 * Created by ken  on 2017/7/25.
 */
const posturl = $("#btn1").val();
const swal = require('sweetalert2')
// CommonJS
$("form").submit(function (event) {
    event.preventDefault();
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!',
    }).then(function () {
        var formData = new FormData($("#myForm")[0]);
        $.ajax({
            type: "POST",
            url: posturl,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                swal({
                        title: 'Updated!',
                        text: 'Your infomation has been updated.',
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
                )
            }
        });
    })

});




