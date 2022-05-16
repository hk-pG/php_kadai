$(() => {
	$('#sendmail').submit((event) => {
		const form = $(this);
		const url = form.attr('action');
		const method = form.attr('method');
		const serialize = form.serialize();

		$.ajax({
			type: method,
			url: url,
			data: serialize,
			dataType: 'json',
			beforeSend: (xhr, status) => {
				// form.find('button').attr('disabled', true);
			},
			complete: (xhr, status) => {
				// form.find('button').attr('disabled', false);
			},
			success: (data, status, xhr) => {
				// if (data.success) {
				// 	form.find('input').val('');
				// 	form.find('textarea').val('');
				// 	form.find('.alert-success').removeClass('hidden');
				// } else {
				// 	form.find('.alert-danger').removeClass('hidden');
				// }
				$('#msg').html(data);
			},
			error: (xhr, status, error) => {
				form.find('.alert-danger').removeClass('hidden');
			},
		});

		return false;
		// event.preventDefault();
	});
});
