   $(function () {

  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
  //  $('#sucess').toggleClass('hidden', !ok);
    $('#error_valid').toggleClass('hidden', ok);
  })

});