<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active">lista de Pilotos</a></li>
                <li class="nav-item"><a class="nav-link" href="piloto.php">Ingresar Piloto</a></li>
                <li class="nav-item"><a href="Carrera.php" class="nav-link">Carrera</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Proyecto</a></li>
            </ul>
        </header>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Dorsal</th>
                <th>Nombre</th>
                <th>Club</th>
                <th>Categoria</th>
            </tr>
        </thead>


        <?php 
    
        $connect = mysqli_connect("localhost","root","","carrera");
    
        $query = mysqli_query($connect,"SELECT * FROM pilotos ");
    
          while ($row=mysqli_fetch_array($query)){
    
        ?>

        <tr>
            <td>
                <?php echo $row['idPiloto'] ?>
            </td>
            <td>
                <?php echo $row['Nombre'] ?>
            </td>
            <td>
                <?php echo $row['Club'] ?>
            </td>
            <td>
                <?php echo $row['Categoria'] ?>
            </td>
        </tr>

        <?php
        }
    
        ?>

    </table>
</body>

</html>