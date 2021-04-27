<?php require_once '../Modelo/Tiempo.php';


			
			$Tiempo = new Tiempo();


			$Tiempo->idPiloto = 1;
			$Tiempo->Fecha = date("D M d, Y G:i");
			$Tiempo->Tiempo = $_POST['tiempo'];
			$Tiempo->ingresar();


//header('Location: ../Vistas/Directores/Directores.php')