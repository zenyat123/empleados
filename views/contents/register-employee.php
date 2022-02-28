

	<h2>Crear empleado</h2>

	<div class = "space-6"></div>

	<form method = "post" class = "form-horizontal" id = "form">

		<div class = "form-group">

			<label for = "id" class = "col-md-3 control-label">Identificación *</label>

			<div class = "col-md-6">

				<input type = "text" name = "id" class = "form-control" id = "id">

			</div>

		</div>

		<div class = "form-group">

			<label for = "nombre" class = "col-md-3 control-label">Nombre completo *</label>

			<div class = "col-md-6">

				<input type = "text" name = "nombre" class = "form-control" id = "nombre" placeholder = "Nombre completo del empleado">

			</div>

		</div>

		<div class = "form-group">

			<label for = "email" class = "col-md-3 control-label">Correo electrónico *</label>

			<div class = "col-md-6">

				<input type = "text" name = "email" class = "form-control" id = "email" placeholder = "Correo electrónico">

			</div>

		</div>

		<div class = "form-group">

			<label for = "sexo" class = "col-md-3 control-label">Sexo *</label>

			<div class = "col-md-6">

				<div class = "radio">

					<label>

						<input type = "radio" name = "sexo" id = "sexo" value = "M">

						Masculino

					</label>

				</div>

				<div class = "radio">

					<label>

						<input type = "radio" name = "sexo" id = "sexo" value = "F">

						Femenino

					</label>

				</div>

			</div>

		</div>

		<div class = "form-group">

			<label for = "area" class = "col-md-3 control-label">Área *</label>

			<div class = "col-md-6">

				<select name = "area" class = "form-control">

					<option value = ""></option>

					<?php

						$consult_areas = EmployeeController::ConsultAreasController();

						foreach($consult_areas as $key => $value)
						{

							echo "<option value = '".$value["id"]."'>".$value["nombre"]."</option>";

						}

					?>

				</select>

			</div>

		</div>

		<div class = "form-group">

			<label for = "descripcion" class = "col-md-3 control-label">Descripción</label>

			<div class = "col-md-6">

				<textarea name = "descripcion" class = "form-control" rows = "10" placeholder = "Descripción"></textarea>

				<div class = "checkbox">

					<label>

						<input type = "checkbox" name = "boletin" value = "1">

						Deseo recibir boletín informativo

					</label>

				</div>

			</div> 

		</div>

		<div class = "form-group">

			<label for = "roles" class = "col-md-3 control-label">Roles *</label>

			<div class = "col-md-6">

				<?php

					$consult_rols = EmployeeController::ConsultRolsController();

					foreach($consult_rols as $key => $value)
					{

						echo "<div class = 'checkbox'>

							<label>

								<input type = 'checkbox' name = 'rol[]' value = '".$value["id"]."'>

								".$value["nombre"]."

							</label>

						</div>";

					}

				?>

			</div>

		</div>

		<button type = "submit" class = "btn btn-primary pull-right">Guardar</button>

		<?php

			$register = EmployeeController::RegisterEmployeeController();

			if($register == "Registrado")
			{

				echo "<div class = 'col-md-offset-3 col-md-6'>

					<div class = 'alert alert-info alert-dismissible fade in' role = 'alert'>

						<button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'>

							<span aria-hidden = 'true'>×</span>

						</button>

						Registro existoso

					</div>

				</div>";

			}
			else if($register == "Inactivo")
			{

				echo "<div class = 'col-md-offset-3 col-md-6'>

					<div class = 'alert alert-danger alert-dismissible fade in' role = 'alert'>

						<button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'>

							<span aria-hidden = 'true'>×</span>

						</button>

						<strong>Advertencia:</strong> No se permiten caracteres desconocidos

					</div>

				</div>";

			}

		?>

	</form>

