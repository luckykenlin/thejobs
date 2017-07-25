/**
 * Created by ken  on 2017/7/25.
 */
// CommonJS
var fm = document.getElementById('myForm');
addEvent(fm,'submit', function () {

   alert('dsdsds');                                      //使用JS方法实现重置

});
// const swal = require('sweetalert2')
//     swal({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!',
//         preConfirm: function () {
//            return true;
//         },
//     }).then(function () {
//         swal(
//             'Deleted!',
//             'Your file has been deleted.',
//             'success'
//         )
//     })


