<?php

	class EmployeeController
	{

		static public function RegisterEmployeeController()
		{

			if(isset($_POST["id"]))
			{

				if(preg_match("/^[0-9]+$/", $_POST["id"]) &&
				   preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/", $_POST["nombre"]) &&
				   preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $_POST["email"]) &&
				   preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9 ]+$/", $_POST["descripcion"]))
				{

					if(isset($_POST["rol"]))
					{

						$table = "empleado_rol";

						$rol = $_POST["rol"];

						foreach($rol as $key)
						{

							$data = array("empleado_id" => $_POST["id"],
								          "rol_id" => $key);

							$request = EmployeeModel::RegisterRolModel($table, $data);

						}

					}

					$table = "empleados";

					isset($_POST["boletin"]) ? $bulletin = $_POST["boletin"] : $bulletin = 0;

					$data = array("id" => $_POST["id"],
								  "nombre" => $_POST["nombre"],
								  "email" => $_POST["email"],
								  "sexo" => $_POST["sexo"],
								  "area" => $_POST["area"],
								  "descripcion" => $_POST["descripcion"],
								  "boletin" => $bulletin);

					$request = EmployeeModel::RegisterEmployeeModel($table, $data);

					return $request;

				}
				else
				{

					return "Inactivo";

				}

			}

		}

		static public function ConsultEmployeesController($field, $value)
		{

			$table = "empleados";

			$request = EmployeeModel::ConsultEmployeesModel($table, $field, $value);

			return $request;

		}

		static public function UpdateEmployeeController($data)
		{

			$table = "empleados";

			$request = EmployeeModel::UpdateEmployeeModel($table, $data);

			return $request;

		}

		static public function DeleteEmployeeController($field, $value)
		{

			$table = "empleados";

			$request = EmployeeModel::DeleteEmployeeModel($table, $field, $value);

			return $request;

		}

		static public function ConsultAreasController()
		{

			$table = "areas";

			$request = EmployeeModel::ConsultAreasModel($table);

			return $request;

		}

		static public function ConsultAreaController($field, $value)
		{

			$request = EmployeeModel::ConsultAreaModel($field, $value);

			return $request;

		}

		static public function ConsultRolsController()
		{

			$table = "roles";

			$request = EmployeeModel::ConsultRolsModel($table);

			return $request;

		}

	}