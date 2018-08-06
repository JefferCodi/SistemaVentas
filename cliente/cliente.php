<?php 
/**
 * Manteniminto de la tb_client
 */
class cliente
{
	private $codigo = '';
	private $nombre = '';
	private $paterno = '';
	private $materno = '';
	private $direccion = '';
	private $telefono = '';
	private $email = '';
	private $distrito = '';

	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setPaterno($paterno)
	{
		$this->paterno = $paterno;
	}
	public function setMaterno($materno)
	{
		$this->materno = $materno;
	}
	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}
	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setDistrito($distrito)
	{
		$this->distrito = $distrito;
	}

	// Metodos get de los clientes
	public function getCodigo()
	{
		return $this->codigo;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getPaterno()
	{
		return $this->paterno;
	}
	public function getMaterno()
	{
		return $this->materno;
	}
	public function getDireccion()
	{
		return $this->direccion;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getDistrito()
	{
		return $this->distrito;
	}
}

?>