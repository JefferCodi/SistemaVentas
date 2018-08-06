<?php 
// error_reporting(0);
include ('clienteCN.php');
$objNeg = new clienteCN();
$cod = $objNeg->generaCodigo();
$distritos = $objNeg->distrito();
?>
<br>
<div class="row">
	<form method="POST" class="col s12 m8 l4 offset-m2 offset-l4">
		<div class="card">
			<div class="card-content blue lighten-4 te blue-text center-align">
				<span class="card-title">REGISTRO DE NUEVO CLIENTE</span>
			</div>
			<div class="card-content">
				<div class="row">
					<div class="input-field col s12  m6 offset-m3 ">
						<input id="codigo" type="text" class="center-align" name="txtCodigo" value="<?php echo $cod ?>" readonly>
						<label for="codigo">CODIGO</label>
					        </div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" class="validate" type="text" name="txtNombre">
						<label for="nombre">NOMBRE</label>
					        </div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<input id="paterno" class="validate" type="text" name="txtPaterno">
						<label for="paterno">PATERNO</label>
			        </div>
			        <div class="input-field col s12 m6">
						<input id="materno" class="validate" type="text" name="txtMaterno">
						<label for="materno">MATERNO</label>
			        </div>
				</div>	
				<div class="row">
					<div class="input-field col s12">
						<input id="direccion" class="validate" type="text" name="txtDireccion">
						<label for="direccion">DIRECCIÓN</label>
			        </div>
				</div>	
				<div class="row">
					<div class="input-field col s12">
						<input id="telefono" class="validate" type="text" name="txtTelefono">
						<label for="telefono">TELÉFONO</label>
			        </div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" class="validate" type="email" name="txtEmail">
						<label for="email">EMAIL</label>
			        </div>
				</div>
				
				<label>DISTRITO</label>
				<select name="selDistrito" class="browser-default">
					<?php foreach ($distritos as $dis) { ?>
					<option value="<?php echo $dis['Dist_id']; ?>"><?php echo $dis['Dist_desc'];?></option>
				    <?php } ?>
				</select>
			
						
			     
			</div>
			<div class="card-action center-align">
				<button class="waves-effect waves-light btn green" type="submit" name="btnMantenimiento" value="REGISTRAR">registrar</button>
			</div>
		</div>
	</form>
</div>