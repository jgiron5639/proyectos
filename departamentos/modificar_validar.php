<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizado</title>
  </head>
  <body>
    <?php

    include("../conexion.php");
   
    $id = $_POST['dep_codigo'];
    $codigo = $_POST['dep_codigo'];
    $nombre = $_POST['dep_nombre'];

    //actualizar los datos
    $Actualizar = "UPDATE departamento SET dep_codigo='$codigo', dep_nombre='$nombre' WHERE dep_codigo='$id'";

    $resultado = mysqli_query($con,$Actualizar);
    if($resultado){
      header ("location:departamento.php");
    }else{
      echo "no actualizaron los datos";
    }

    
    ?>
    
  </body>

</html>
