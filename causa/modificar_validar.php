<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizado</title>
  </head>
  <body>
    <?php

    include("../conexion.php");
   
    $codigo = $_POST['cad_codigo'];
    $causa = $_POST['cad_descripcion'];
    $estado = $_POST['cad_mat_estado'];

    //actualizar los datos
    $Actualizar = "UPDATE causa_desercion SET cad_codigo='$codigo', cad_descripcion='$causa', cad_mat_estado='$estado' WHERE cad_codigo='$codigo'";

    $resultado = mysqli_query($con,$Actualizar);
    if($resultado){
      header ("location:Causa.php");
    }else{
      echo "no actualizaron los datos";
    }

    
    ?>
    
  </body>

</html>

