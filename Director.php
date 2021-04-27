<?php
require_once 'conexion_mysqli.php';

class Director
{
    public $idDirector;
    public $Nombre;
    public $Nacionalidad;
    public $sexo;
    private $conexion;

    public function __construct()
    { //CONSTRUCTOR
        $this->idDirector = 0;
        $this->Nombre = '';
        $this->Nacionalidad = '';
        $this->sexo = '';
        $this->conexion = new conexion_mysqli();
    }



    public static function listar()
    { //FUNCION PARA SELECCIONAR TODOS LOS ELEMENTOS DIRECTOR
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar('SELECT * FROM directores');
        $conexion->cerrar();
        return $listado;
    }

    public static function obtenerPorId($idDirector)
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM directores WHERE idDirector = $idDirector");
        $conexion->cerrar();
        return $listado;
    }

    public function ingresar()
    { //FUNCION ANIADIR ELEMENTO DIRECTOR A LA BD
        $sql = "INSERT INTO directores (Nombre, Nacionalidad , sexo) VALUES ('$this->Nombre', '$this->Nacionalidad', '$this->sexo')";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function eliminar()
    { //FUNCION ELIMINAR ELEMENTO DIRECTOR DE LA BD 
     //   $sql = "DELETE FROM directores WHERE idDirector = $this->idDirector";
        $sql = "DELETE FROM directores WHERE idDirector = '$this->idDirector'";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }

    public function editar()
    { //FUNCION EDITAR ELEMENTO DIRECTOR
        $sql = "UPDATE directores SET Nombre = '$this->Nombre', Nacionalidad = '$this->Nacionalidad', sexo = '$this->sexo' WHERE idDirector = $this->idDirector";
        $resultado = $this->conexion->actualizar($sql);
        $this->conexion->cerrar();
        return $resultado;
    }
    
    public static function obtenerPeliculasPorDirector($idDirector) 
    { //FUNCION PARA SELECCIONAR POR ID 
        $conexion = new conexion_mysqli();
        $listado = $conexion->consultar("SELECT * FROM pelicula WHERE idDirector = $idDirector");
        $conexion->cerrar();
        return $listado;
    }
    
}
