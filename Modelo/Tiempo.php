<?php
require_once 'conexion_mysqli.php';

class Tiempo
{
    public $idTiempo;
    public $idPiloto;
    public $Fecha;
    public $Tiempo;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idPiloto = 0;
        $this->idTiempo = '';
        $this->Fecha = '';
        $this->Tiempo = '';
        $this->conexion = new conexion_mysqli();
    }



    public static function listar()
    { //FUNCION PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM tiempos');
        $conexion->cerrar();
        return $listado;
    }

    public static function obtenerTiemposPorIdPiloto($idTiempo)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM tiempos WHERE idPiloto = $idPiloto");
        $conexion->cerrar();
        return $listado;
    }

    
    public static function obtenerPorId($idTiempo)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM tiempos WHERE idTiempo = $idTiempo");
        $conexion->cerrar();
        return $listado;
    }


    public function ingresar()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
        $sql = "INSERT INTO tiempos (idPiloto, Fecha, Tiempo) VALUES ('$this->idPiloto', '$this->Fecha', '$this->Tiempo')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }


}
