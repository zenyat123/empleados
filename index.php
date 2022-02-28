<?php

	require_once("controllers/principal_controller.php");

	require_once("controllers/routes_controller.php");

	require_once("controllers/employee_controller.php");

	require_once("models/employee_model.php");

	$principal = new PrincipalController();
	$principal -> Principal();