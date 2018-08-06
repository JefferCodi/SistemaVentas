<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="../js/materialize.js"></script>
</head>
<body>
	<?php 
	error_reporting(0);
	include ('encabezado.php');
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

	include ('clienteCN.php');
	$objNeg = new clienteCN();
	$codigo = $_GET['id'];
	$clientes = $objNeg->buscarCliente($codigo);
	$distrito = $objNeg->distrito();
	if ($distrito[0]=$clientes[7]) {
		
	}
	?>
	<br>
	<div class="row">
		<form method="POST" class="col s4 offset-s4"> 
			<div class="card">
				<div class="card-content blue lighten-4 te blue-text center-align">
					<span class="card-title">DESCRIPCION DEL CLIENTE</span>
				</div>
				<div class="card-content">
					<table border="0" width="750" cellpadding="1" cellspacing="1">
						<tr>
							<th>CODIGO</th>
							<td><?php echo $clientes[0]; ?></td>
						</tr>
						<tr>
							<th>NOMBRE</th>
							<td><?php echo $clientes[1] ?></td>							
						</tr>
						<tr>
							<th>PATERNO</th>
							<td><?php echo $clientes[2]; ?></td>
						</tr>
						<tr>
							<th>MATERNO</th>
							<td><?php echo $clientes[3] ?></td>
						</tr>
						<tr>
							<th>DIRECCION</th>
							<td><?php echo $clientes[4] ?></td>
						</tr>
						<tr>
							<th>TELEFONO</th>
							<td><?php echo $clientes[6] ?></td>
						</tr>
						<tr>
							<th>EMAIL</th>
							<td><?php echo $clientes[5] ?></td>
						</tr>
						<tr>
							<th>DISTRITO</th>
							<td><?php echo $clientes[7] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</div>
</body>
</html>