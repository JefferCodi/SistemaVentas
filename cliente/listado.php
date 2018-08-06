<?php 
include 'clienteCN.php';

$objNeg = new clienteCN();
$clientes = $objNeg->consulta();
 ?>
<br>
<div class="row">
	<div class="col s10 offset-s1">
		<form method="POST">
			<table class="responsive-table striped" border="0" cellpadding="1" cellspacing="1">
				<tr class="blue lighten-4 blue-text">
					<th>CODIGO</th>
					<th>NOMBRES</th>
					<th>DIRECCIÓN</th>
					<th>TELÉFONO</th>
					<th>DISTRITO</th>
					<th>EMAIL</th>
					<th>ACCIÓN</th>
				</tr>
				<?php foreach ($clientes as $cli) { ?>
				<tr>
					<td><?php echo $cli['Clie_id']; ?></td>
					<td><?php echo $cli['nombre'] ?></td>
					<td><?php echo $cli['Clie_dire']; ?></td>
					<td><?php echo $cli['Clie_fono']; ?></td>
					<td><?php echo $cli['Dist_desc']; ?></td>
					<td><?php echo $cli['Clie_emai']; ?></td>
					<td class="center-align">
						<a class="btn-floating btn-small waves-effect waves-ligth blue" href="visualiza.php?id=<?php echo $cli['Clie_id']; ?>"><i class="material-icons">remove_red_eye</i></a>
						<a href="actualiza.php?id=<?php echo $cli['Clie_id'] ?>"  class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
						<a href="elimina.php?id=<?php echo $cli['Clie_id'] ?>" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
					</td>
				</tr>
			    <?php } ?>
			</table>
		</form>
	</div>
</div>