

	<table class = "table table-bordered">

		<thead>

			<tr>

				<th><i class = "icon-ok"></i> Identificación</th>
				<th><i class = "icon-user"></i> Nombres</th>
				<th><i class = "icon-envelope"></i> Email</th>
				<th><i class = "icon-briefcase"></i> Área</th>
				<th><i class = "icon-mail-forward"></i> Boletín</th>
				<th></th>

			</tr>

		</thead>

		<tbody>

			<?php

				$employees = EmployeeController::ConsultEmployeesController("", "");

				foreach($employees as $key => $value)
				{

					$area = EmployeeController::ConsultAreaController("id", $value["id"]);

					$bulletin = $value["boletin"] == 1 ? $bulletin = "Sí" : $bulletin = "no";

					echo "<tr>

						<td>".$value["id"]."</td>
						<td>".$value["nombre"]."</td>
						<td>".$value["email"]."</td>
						<td>".$area["nombre"]."</td>
						<td>".$bulletin."</td>
						<td>

							<div class = 'btn-group'>

								<button class = 'btn btn-default buttonUpdatingEmployee' title = 'Actualizar' idEmployee = '".$value["id"]."' data-toggle = 'modal' data-target = '#modalUpdateEmployee'>

									<i class = 'icon-edit text-primary'></i>

								</button>

								<button class = 'btn btn-default buttonDeletingEmployee' title = 'eliminar' idEmployee = '".$value["id"]."' nameEmployee = '".$value["nombre"]."' data-toggle = 'modal' data-target = '#modalDeleteEmployee'>

									<i class = 'icon-exclamation text-danger'></i>

								</button>

							</div>

						</td>

					</tr>";

				}

			?>	

		</tbody>

	</table>

	<a href = "register-employee" class = "btn btn-primary pull-right">Registrar</a>

	<div class = "modal fade" id = "modalUpdateEmployee" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-title text-primary">Actualizar empleado</h4>	

				</div>

				<div class = "modal-body">

					<form class = "form-horizontal">

						<input type = "hidden" id = "updateEmployee">

						<div class = "form-group">

							<label for = "updateNombre" class = "col-md-4 control-label">Nombre completo:</label>

							<div class = "col-md-8">

								<input type = "text" class = "form-control" id = "updateNombre" placeholder = "Nombre completo del empleado">

							</div>

						</div>

						<div class = "form-group">

							<label for = "updateEmail" class = "col-md-4 control-label">Correo electrónico:</label>

							<div class = "col-md-8">

								<input type = "text" class = "form-control" id = "updateEmail" placeholder = "Correo electrónico">

							</div>

						</div>

						<div class = "form-group">

							<label for = "updateDescripcion" class = "col-md-4 control-label">Descripción</label>

							<div class = "col-md-8">

								<textarea class = "form-control" id = "updateDescripcion" rows = "10" placeholder = "Descripción"></textarea>

							</div>

						</div>

					</form>

				</div>

				<div class = "modal-footer">

					<button class = "btn btn-primary" id = "buttonUpdateEmployee">Actualizar</button>

				</div>

			</div>

		</div>

	</div>

	<div class = "modal fade" id = "modalDeleteEmployee" role = "dialog">

		<div class = "modal-dialog">

			<div class = "modal-content">

				<div class = "modal-header">

					<h4 class = "modal-title text-danger">eliminar empleado</h4>

				</div>

				<div class = "modal-body">

					

				</div>

				<div class = "modal-footer">

					<button class = "btn btn-default" data-dismiss = "modal">Cancelar</button>

					<button class = "btn btn-danger" id = "buttonDeleteEmployee">eliminar</button>

				</div>

			</div>

		</div>

	</div>

