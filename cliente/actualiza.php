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
		}elseif ($boton == "ACTUALIZA") {
			
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

			$objNeg->actualiza($objCli->getCodigo(), $objCli->getNombre(), $objCli->getPaterno(), $objCli->getMaterno(), $objCli->getDireccion(), $objCli->getTelefono(), $objCli->getEmail(), $objCli->getDistrito());		}
	}

	include ('clienteCN.php');
	$objNeg = new clienteCN();
	$codigo = $_GET['id'];
	
	$clientes = $objNeg->buscarCliente($codigo);	
	$distritos = $objNeg->distrito();
	?>
	<br>
	<div class="row">
	<form method="POST" class="col s12 m8 l4 offset-m2 offset-l4">
		<div class="card">
			<div class="card-content blue lighten-4 te blue-text center-align">
				<span class="card-title">ACTUALIZA DATOS DEL CLIENTE</span>
			</div>
			<div class="card-content">
				<div class="row">
					<div class="input-field col s12  m6 offset-m3 ">
						<input id="codigo" type="text" class="center-align" name="txtCodigo" value="<?php echo $clientes[0] ?>" readonly>
						<label for="codigo">CODIGO</label>
					        </div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" class="validate" type="text" name="txtNombre" value="<?php echo $clientes[1] ?>">
						<label for="nombre">NOMBRE</label>
					        </div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input id="paterno" class="validate" type="text" name="txtPaterno" value="<?php echo $clientes[2] ?>">
						<label for="paterno">PATERNO</label>
			        </div>
			        <div class="input-field col s12 m6">
						<input id="materno" class="validate" type="text" name="txtMaterno" value="<?php echo $clientes[3] ?>">
						<label for="materno">MATERNO</label>
			        </div>
				</div>	
				<div class="row">
					<div class="input-field col s12">
						<input id="direccion" class="validate" type="text" name="txtDireccion" value="<?php echo $clientes[4] ?>">
						<label for="direccion">DIRECCIÓN</label>
			        </div>
				</div>	
				<div class="row">
					<div class="input-field col s12">
						<input id="telefono" class="validate" type="text" name="txtTelefono" value="<?php echo $clientes[5] ?>">
						<label for="telefono">TELÉFONO</label>
			        </div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" class="validate" type="text" name="txtEmail" value="<?php echo $clientes[6] ?>">
						<label for="email">EMAIL</label>
			        </div>
				</div>
				
				<label>DISTRITO</label>
				<select name="selDistrito" class="browser-default">
					<?php 
					$seleccionado = '';
					foreach ($distritos as $dis) { 
						if ($dis['Dist_id']==$clientes[8]) 
							$seleccionado = ' SELECTED ';
						else
							$seleccionado = '';
						?>
					<option value="<?php echo $dis['Dist_id']; ?>" <?php echo $seleccionado; ?>><?php echo $dis['Dist_desc'];?></option>
				    <?php } ?>
				</select>
			
						
			     
			</div>
			<div class="card-action center-align">
				<button class="waves-effect waves-light btn orange" type="submit" name="btnMantenimiento" value="ACTUALIZA">actualizar</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>