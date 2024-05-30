$(document).ready(function() {
  $('#product-form').submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'submit.php',
      data: formData,
      success: function(data) {
        $('#data-table').append(data);
        $('#product-form')[0].reset();
      }
    });
  });
});