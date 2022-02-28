<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>Principal</title>

	<?php

		$web = RoutesController::Web();

	?>

	<link href = "https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel = "stylesheet">
	<link href = "https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel = "stylesheet">

	<link href = "<?php echo $web ?>/views/css/styles.css" rel = "stylesheet">

	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src = "https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</head>

<body>

	<div class = "container">

		<a href = "<?php echo $web ?>">

			<h1 class = "text-primary text-center">Sistema de Empleados</h1>

		</a>

		<hr>

		<?php

			$route = array();

			if(!isset($_GET["route"]))
			{

				include("contents/employees.php");

			}
			else
			{

				$route = explode("/", $_GET["route"]);

				if($route[0] == "employees" || $route[0] == "register-employee")
				{

					include("contents/".$route[0].".php");

				}

			}

		?>

	</div>

	<input type = "hidden" value = "<?php echo $web ?>" id = "principal">

	<script src = "<?php echo $web ?>/views/js/principal.js"></script>

</body>

</html>