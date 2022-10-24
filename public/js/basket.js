/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/basket.js ***!
  \********************************/
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function () {
  blocks = $('.block');
  $.each(blocks, function (index, value) {
    div = this;
    $(div).find('.delete_basket_product').click(function () {
      $.ajax({
        type: "post",
        url: "/basket/delete",
        data: {
          'name': $(blocks[index]).find('.basket-shoes_name').text()
        },
        success: function success(response) {
          location.reload();
        }
      });
    });
  });
  $("#checkout").click(function () {
    $.ajax({
      type: "post",
      url: "/order/8b1df807913bf7cfa8058ee1edd7d7e6",
      data: {
        'k': '<?=md5(time()+1)?>',
        'q': '<?=md5(time()+2)?>',
        'w': '<?=md5(time())?>',
        'm': '<?=md5(time()+3)?>'
      },
      success: function success(response) {
        location.href = '/order?key=<?=md5(time())?>';
      }
    });
  });
});
/******/ })()
;