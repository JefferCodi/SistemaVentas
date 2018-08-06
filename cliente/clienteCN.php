<?php 
/**
 * 
 */
class clienteCN
{	
	public function consulta()
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$sql = "SELECT c.Clie_id, CONCAT(c.Clie_nomb, ' ', c.Clie_pate, ' ', c.Clie_mete) as nombre, c.Clie_dire, c.Clie_fono, d.Dist_desc, c.Clie_emai FROM tb_client c INNER JOIN tb_distri d on c.Dist_id=d.Dist_id";
		$rs = mysqli_query($cn, $sql);
		while ($misclientes = mysqli_fetch_array($rs)) {
			$cliente[]=$misclientes;
		}
		return $cliente;
	}
	public function distrito()
	{
		include_once '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$sql = 'SELECT * FROM tb_distri';
		$rs = mysqli_query($cn, $sql);
		while ($dist = mysqli_fetch_array($rs)) {
			$distrito[]=$dist;
		}
		return $distrito;
	}
	public function generaCodigo()
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$rs = mysqli_query($cn, "SELECT Clie_id FROM tb_client ORDER BY Clie_id DESC LIMIT 1");
		$fila = mysqli_fetch_array($rs);
		return 'C'.str_pad((substr($fila[0], -4)+1),4,'0', STR_PAD_LEFT);;
	}
	public function registrar($cod, $nom, $pat, $mat, $dir, $tel, $ema, $dis)
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$rs = mysqli_query($cn, "INSERT INTO tb_client VALUES('$cod','$nom', '$pat', '$mat', '$dir', '$ema', '$tel', '$dis')");
		if ($rs)
			echo "<h5>Registro de cliente correcto..!!</h5>";
		else
			echo "<h5>Ocurrio un error al registrar el cliente ".mysqli_error($cn)."</h5>";
	}
	public function buscarCliente($codigo)
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$rs =  mysqli_query($cn, "SELECT c.Clie_id, c.Clie_nomb, c.Clie_pate, c.Clie_mete, c.Clie_dire, c.Clie_fono, c.Clie_emai, d.Dist_desc, d.Dist_id FROM tb_client c INNER JOIN tb_distri d ON c.Dist_id = d.Dist_id WHERE Clie_id='$codigo'");
		$miCliente = mysqli_fetch_array($rs);
		return $miCliente;
	}
	public function actualiza($cod, $nom, $pat, $mat, $dir, $tel, $ema, $dis)
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$rs = mysqli_query($cn, "UPDATE tb_client SET Clie_nomb='$nom',Clie_pate='$pat',Clie_mete='$mat',Clie_dire='$dir',Clie_emai='$ema',Clie_fono='$tel',Dist_id='$dis' WHERE Clie_id='$cod'");
		if ($rs)
			echo "<h5>Cliente actualizado correctamente</h5>";
		else
			echo "<h5>Ocurrio un error al actualizar el cliente ".mysqli_error($cn)."</h5>";
	}
	public function elimina($cod)
	{
		include '../conexion/conexion.php';
		$objCon = new conexion();
		$cn = $objCon->getConecta();
		$rs =  mysqli_query($cn, "DELETE FROM tb_client WHERE Clie_id='$cod'");
		if ($rs) 
			echo "<h5>Cliente eliminado correctamente</h5>";
		else
			echo "<h5>Ocurrio un error al eliminar al cliente ".mysqli_error($cn)."</h5>";
	}
}

 ?>