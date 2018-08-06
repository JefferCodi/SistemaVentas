<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src="../js/materialize.js"></script>
</head>
<body>
	<?php 
	include('encabezado.php');
	if (isset($_POST['btnMantenimiento'])) {
		$boton = $_POST['btnMantenimiento'];
		if ($boton == "AGREGAR NUEVO CLIENTE") {
			include ('nuevo.php');
		}elseif ($boton == "LISTADO DE CLIENTE") {
			include ('listado.php');
		}elseif ($boton == "REGISTRAR") {
			include ('cliente.php');
			include ('clienteCN.php');

			$objCli = new cliente();
			$objNeg = new clienteCN();

			$objCli->setCodigo($_POST['txtCodigo']);
			$objCli->setNombre($_POST['txtNombre']);
			$objCli->setPaterno($_POST['txtPaterno']);
			$objCli->setMaterno($_POST['txtMaterno']);
			$objCli->setDireccion($_POST['txtDireccion']);
			$objCli->setTelefono($_POST['txtTelefono']);
			$objCli->setEmail($_POST['txtEmail']);
			$objCli->setDistrito($_POST['selDistrito']);

			$objNeg->registrar($objCli->getCodigo(), $objCli->getNombre(), $objCli->getPaterno(), $objCli->getMaterno(), $objCli->getDireccion(), $objCli->getTelefono(), $objCli->getEmail(), $objCli->getDistrito());
		}
	}
	else
		include ('listado.php');
	?>
</body>
</html>