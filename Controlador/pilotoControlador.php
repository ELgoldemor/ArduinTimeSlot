<?php require_once '../Modelo/Piloto.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$Piloto = new Piloto();

	switch ($accion) {
		case 'Ingresar':
			$Piloto->Nombre = $_POST['Nombre'];
			$Piloto->Club = $_POST['Club'];
			$Piloto->Categoria = $_POST['Categoria'];
			$Piloto->ingresar();
			break;
	}
}

header('Location: ../Vista/piloto.php');