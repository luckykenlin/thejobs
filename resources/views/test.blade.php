$('.stat1uspicker').delegate("select","change",function () {
let page = $('.pagination .active span').text();
let url = $(this).val();
let taken = document.querySelector("#token").getAttribute("content");
let status = $(this).find("option:selected").text();
jQuery("#load").show();
axios.post(url+'?'+'&page='+page , {
_token: taken,
status: status
}) .then(function (response) {
jQuery("#load").hide();
$('#loader').html(response.data);
$('.selectpicker').selectpicker('refresh');
console.log(response);
})
.catch(function (error) {
alert('Something wrong!');
console.log(error);
});
});