<?php

	require_once("../controllers/employee_controller.php");
	require_once("../models/employee_model.php");

	class EmployeesAjax
	{

		public $id_employee;
		public $id_employee_update;
		public $id_employee_delete;
		public $nombre;
		public $email;
		public $descripcion;

		public function ConsultEmployeesAjax()
		{

			$field = "id";
			$value = $this -> id_employee;

			$request = EmployeeController::ConsultEmployeesController($field, $value);

			echo json_encode($request);

		}

		public function UpdateEmployeeAjax()
		{

			$data = array("id" => $this -> id_employee_update,
				          "nombre" => $this -> nombre,
				          "email" => $this -> email,
				          "descripcion" => $this -> descripcion);

			$request = EmployeeController::UpdateEmployeeController($data);

			echo $request;

		}

		public function DeleteEmployeeAjax()
		{

			$field = "id";
			$value = $this -> id_employee_delete;

			$request = EmployeeController::DeleteEmployeeController($field, $value);

			echo $request;

		}

	}

	if(isset($_POST["idEmployee"]))
	{

		$consult = new EmployeesAjax();
		$consult -> id_employee = $_POST["idEmployee"];
		$consult -> ConsultEmployeesAjax();

	}

	if(isset($_POST["idEmployeeUpdate"]))
	{

		$update = new EmployeesAjax();
		$update -> id_employee_update = $_POST["idEmployeeUpdate"];
		$update -> nombre = $_POST["nombre"];
		$update -> email = $_POST["email"];
		$update -> descripcion = $_POST["descripcion"];
		$update -> UpdateEmployeeAjax();

	}

	if(isset($_POST["idEmployeeDelete"]))
	{

		$delete = new EmployeesAjax();
		$delete -> id_employee_delete = $_POST["idEmployeeDelete"];
		$delete -> DeleteEmployeeAjax();

	}