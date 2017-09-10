$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var calls = 0;

  $('select#tranxPerTranxType').on('change', function() {
    //e.preventDefault();
    var url, request, tag, data, id;

    tag = $(this);
    id = tag.val();

    url = '/chart/call/tranxPerTranxType/' + id + '';
    data = tag.serialize();

    request = $.ajax({
      method: "post",
      url: url,
      data: data
    });

    request.done(function(response) {
      if (response.status == 'success') {
        $('#tranxPerTranxTypeChart').html(response.html);
        // tag[0].reset();
      }
    });
  });
});
