<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Add Directores</title>
</head>
<?php require '../Parciales/navbar.php' ?>

<body>
	<header>
		<h1>Directores</h1>
		<h2>Add</h2>
	</header>

	<form action="../../Controladores/DirectorController.php" method="post">
        <input type="text" name="Nombre" placeholder="Nombre" required autofocus />
		<p>Elija Nacionalidad:
			<select name="Nacionalidad" id="Nacionalidad">
 				<option  name="Nacionalidad" id="Nacionalidad" value="Española">Española</option>
  				<option  name="Nacionalidad" id="Nacionalidad" value="Inglesa">Inglesa</option>
  				<option  name="Nacionalidad" id="Nacionalidad" value="Rumana">Rumana</option>
  				<option  name="Nacionalidad" id="Nacionalidad" value="Marroqui">Marroqui</option>
			</select>
			</p>
			<p>Elija Sexo:
			<select name="sexo" id="sexo">
 				<option  name="sexo" id="sexo" value="Masculino">Masculino</option>
  				<option  name="sexo" id="sexo" value="Femenino">Femenino</option>
  				<option  name="sexo" id="sexo" value="Otro">Otro</option>
			</select>
			</p>
		<input name="a" type="submit" value="Ingresar" />
	</form>
</body>
</html>