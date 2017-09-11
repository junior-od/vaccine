$('body').on('click', 'a.api_call', function(e){
    e.preventDefault();
    $('#loading-s').removeClass('hide');

				$.ajaxSetup({
			     headers: {
			       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			     }
			  });

				var url, request, tag, data, name;
	      tag = $(this);
				name = tag.attr('name');
	      url = '/super/api/call/' + name + '';
	      data = tag.serialize();

	      request = $.ajax({
	          method: "post",
	          url: url,
	          data: data
	      });

				request.done(function (response){
	         if (response.status == 'success') {
              // alert(response.html);
               $("#api_response").append(response.html);
               $('#loading-s').addClass('hide');

	         }
	      });

});
