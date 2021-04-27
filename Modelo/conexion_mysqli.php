<?php
class conexion_mysqli {
    private $servidorBD;
	private $usuario;
    private $passwd;
    private $BD;
    private $conexion;

	public function __construct () {
        $this->servidorBD = 'localhost';
        $this->usuario = 'root';
        $this->passwd = '';
        $this->BD = 'carrera';
		$this->conexion = new mysqli($this->servidorBD, $this->usuario, $this->passwd, $this->BD);
		$this->conexion->set_charset('utf8');
	}

	public function consultar ($sql) {
		return $this->conexion->query($sql)->fetch_all();
	}

	public function actualizar ($sql) {
		return $this->conexion->query($sql);
	}

	public function numFilas ($idGenero) {
		$resultado = $this->conexion->query("SELECT COUNT(*) FROM genero WHERE idGenero = $idGenero");
		$resultado2 = $resultado->fetch_array();
		$numFilas = intval($resultado2[0]);
		return $numFilas;
	}

	public function cerrar () {
		$this->conexion->close();
	}
}