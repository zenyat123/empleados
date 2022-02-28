<?php

	require_once("connection.php");

	class EmployeeModel
	{

		static public function RegisterEmployeeModel($table, $data)
		{

			$sql = "insert into $table (id, nombre, email, sexo, area_id, descripcion, boletin) 
			                    values (:id, :nombre, :email, :sexo, :area_id, :descripcion, :boletin)";

			$stmt = Connection::Connect()->prepare($sql);

			$stmt -> bindParam(":id", $data["id"]);
			$stmt -> bindParam(":nombre", $data["nombre"]);
			$stmt -> bindParam(":email", $data["email"]);
			$stmt -> bindParam(":sexo", $data["sexo"]);
			$stmt -> bindParam(":area_id", $data["area"]);
			$stmt -> bindParam(":descripcion", $data["descripcion"]);
			$stmt -> bindParam(":boletin", $data["boletin"]);

			if($stmt -> execute())
			{

				return "Registrado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function ConsultEmployeesModel($table, $field, $value)
		{

			if($field == "")
			{

				$stmt = Connection::Connect()->prepare("select * from $table");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			else
			{

				$stmt = Connection::Connect()->prepare("select * from $table where $field = :value");

				$stmt -> bindParam(":value", $value);

				$stmt -> execute();

				return $stmt -> fetch();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function UpdateEmployeeModel($table, $data)
		{

			$stmt = Connection::Connect()->prepare("update $table set nombre = :nombre, email = :email, descripcion = :descripcion where id = :id");

			$stmt -> bindParam(":id", $data["id"]);
			$stmt -> bindParam(":nombre", $data["nombre"]);
			$stmt -> bindParam(":email", $data["email"]);
			$stmt -> bindParam(":descripcion", $data["descripcion"]);

			if($stmt -> execute())
			{

				return "Actualizado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function DeleteEmployeeModel($table, $field, $value)
		{

			$stmt = Connection::Connect()->prepare("delete from $table where $field = :value");

			$stmt -> bindParam(":value", $value);

			if($stmt -> execute())
			{

				return "eliminado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function ConsultAreasModel($table)
		{

			$stmt = Connection::Connect()->prepare("select * from $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;

		}

		static public function ConsultAreaModel($field, $value)
		{

			$stmt = Connection::Connect()->prepare("select areas.nombre from areas inner join empleados on areas.id = empleados.area_id and empleados.$field = :value");

			$stmt -> bindParam(":value", $value);

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;

		}

		static public function RegisterRolModel($table, $data)
		{

			$stmt = Connection::Connect()->prepare("insert into $table (empleado_id, rol_id) values (:empleado_id, :rol_id)");

			$stmt -> bindParam(":empleado_id", $data["empleado_id"]);
			$stmt -> bindParam(":rol_id", $data["rol_id"]);

			if($stmt -> execute())
			{

				return "Registrado";

			}
			else
			{

				return $stmt -> errorInfo();

			}

			$stmt -> close();

			$stmt = null;

		}

		static public function ConsultRolsModel($table)
		{

			$stmt = Connection::Connect()->prepare("select * from $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;

		}

	}