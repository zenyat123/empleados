

var principal = $('#principal').val();

$('#form').validate({

	rules: {

		id: {
			required: true,
			number: true
		},

		nombre: {
			required: true,
			minlength: 3
		},

		email: {
			required: true,
			email: true
		},

		area: {
			required: true
		},

		descripcion: {
			required: true,
		}

	}

});

$('.buttonUpdatingEmployee').click(function(){

	var idEmployee = $(this).attr('idEmployee');

	data = new FormData();

	data.append('idEmployee', idEmployee);

	$.ajax({

		url: principal + '/ajax/employees_ajax.php',
		method: 'post',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(response){

			$('#modalUpdateEmployee #updateEmployee').val(response['id']);
			$('#modalUpdateEmployee #updateNombre').val(response['nombre']);
			$('#modalUpdateEmployee #updateEmail').val(response['email']);
			$('#modalUpdateEmployee #updateDescripcion').val(response['descripcion']);

			$('#buttonUpdateEmployee').click(function(){

				var idEmployee = $('#modalUpdateEmployee #updateEmployee').val();
				var nombre = $('#modalUpdateEmployee #updateNombre').val();
				var email = $('#modalUpdateEmployee #updateEmail').val();
				var descripcion = $('#modalUpdateEmployee #updateDescripcion').val();

				data = new FormData();

				data.append('idEmployeeUpdate', idEmployee);
				data.append('nombre', nombre);
				data.append('email', email);
				data.append('descripcion', descripcion);

				$.ajax({

					url: principal + '/ajax/employees_ajax.php',
					method: 'post',
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					success: function(response){

						if(response == 'Actualizado'){

							window.location = principal;

						}

					}

				});

			});

		}

	});

});

$('.buttonDeletingEmployee').click(function(){

	var idEmployee = $(this).attr('idEmployee');
	var nameEmployee = $(this).attr('nameEmployee');

	$('#modalDeleteEmployee .modal-body').append('¿confirma la eliminación del empleado ' + nameEmployee + '?');

	$('#buttonDeleteEmployee').click(function(){

		data = new FormData();

		data.append('idEmployeeDelete', idEmployee);

		$.ajax({

			url: principal + '/ajax/employees_ajax.php',
			method: 'post',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response){

				if(response == 'eliminado'){

					window.location = principal;

				}

			}

		});

	});

});

