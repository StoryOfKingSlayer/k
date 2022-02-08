var files;
$('.like').click(function(event){
	var clickId = $(this).prop('id');
	$('.like[id='+ clickId + ']').toggleClass('new');
});

$('#field_img').on('change', function () {
	files = this.files;
});

$('#bt').click(function (e) {
	e.preventDefault();
	var data = new FormData();
	$.each(files, function (key, value) {
		data.append(key, value);
	});
	data.append('title', $('.text_field_1').val());
	data.append('text', $('.text_field_2').val());
	data.append('my_file_upload', 3);
	$.ajax({
		url: 'php_scripts/generation.php',
		type: 'POST', // важно!
		data: data,

		dataType: 'json',
		processData: false,
		contentType: false,
		success: function (respond, status, jqXHR) {

			// ОК - файлы загружены
			if (typeof respond.error === 'undefined') {
				// выведем пути загруженных файлов в блок '.ajax-reply'
				var files_path = respond.files;
				var html = '';
				$.each(files_path, function (key, val) {
					html += val + '<br>';
				})

				$('.ajax-reply').html(html);
			}
			
			// ошибка
			else {
				console.log('ОШИБКА: ' + respond.data);
			}
		},
		// функция ошибки ответа сервера
		error: function (jqXHR, status, errorThrown) {
			console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
		}
	});
});


