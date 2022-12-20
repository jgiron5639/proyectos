<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizado</title>
  </head>
  <body>
    <?php

    include("../conexion.php");
   
    $id = $_POST['tii_id'];
    $identificacion = $_POST['tii_descripcion'];
    $sigla = $_POST['tii_sigla'];
    
    

    //actualizar los datos
    $actualizar = "UPDATE tipo_id SET tii_descripcion='$identificacion', tii_sigla='$sigla' WHERE tii_id='$id'";

    $resultado = mysqli_query($con,$actualizar);
    if($resultado){
      header ("location:tipo_id.php");
    }else{
      echo "No actualizaron los datos";
    }

    
    ?>
    
  </body>

</html>