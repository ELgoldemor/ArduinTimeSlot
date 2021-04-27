<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Add Piloto</title>
</head>

<body>
<div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active">Carrera</a></li>
                <li class="nav-item"><a href="#" class="nav-link" href="../pagina/Vista/piloto.php">Ingresar Piloto</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Información</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Proyecto</a></li>
            </ul>
        </header>
    </div>
    <form action="../Controlador/pilotoControlador.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre de Piloto</label>
    <input type="text" class="form-control" name="Nombre" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Categoria</label>
    
    <input type="text" class="form-control" name="Categoria">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Club</label>
    
    <input type="text" class="form-control" name="Club">
  </div>
  
  <input name="a" type="submit" value="Ingresar" />
</form>
	
</body>
</html>