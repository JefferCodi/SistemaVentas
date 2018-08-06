<?php 
/**
 * 
 */
class conexion
{
	private $cn = null;
	function __construct()
	{
		$this->cn = mysqli_connect('localhost','root','XXXXX','db_ventas2018');
		mysqli_set_charset($this->cn, "utf8");
	}
	public function getConecta(){
		return $this->cn;
	}
}
 ?>