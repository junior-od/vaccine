$('body').on('click', 'a.toggle_user', function(e) {

	e.preventDefault();

	$button = $(this);

	if ($button.hasClass('btn-danger')) { //active user

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});


		var url, request, id;

		tag = $(this);
		id = tag.attr('id');
		url = '/user/toogle/status/' + id + '';
		data = tag.serialize();

		request = $.ajax({

			method: "post",
			url: url,
			data: data
	
		});

		request.done(function (response) {

			if (response.status == 'success') {
				$button.removeClass('btn-danger');
				$button.addClass('btn-success');
				$button.text('Activate');
			}

		});
		


	} else {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});


		var url, request, id;

		tag = $(this);
		id = tag.attr('id');
		url = '/user/toogle/status/' + id + '';
		data = tag.serialize();

		request = $.ajax({

			method: "post",
			url: url,
			data: data
	
		});

		request.done(function (response) {

			if (response.status == 'success') {
				$button.removeClass('btn-success');
				$button.addClass('btn-danger');
				$button.text('Deactivate');
			}

		});

	}

});