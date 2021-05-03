<!DOCTYPE html>
<html lang="en">

<head>

    <title>Lista de pilotos</title>
</head>

<body>
<h1>Lista de pilotos</h1>
</div>

<table class="">
    <thead>
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
      <td><?php echo $row['idPiloto'] ?></td>
      <td><?php echo $row['Nombre'] ?></td>
      <td><?php echo $row['Club'] ?></td>
      <td><?php echo $row['Categoria'] ?></td>
    </tr>

    <?php
    }

    ?>  

  </table>
</div>



</body>


</html> 