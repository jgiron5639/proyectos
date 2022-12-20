<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizado</title>
  </head>
  <body>
    <?php

    include("../conexion.php");
   
    $codigo = $_POST['fic_numero'];
    $id = $_POST['fic_numero'];
    $programa = $_POST['pro_codigo'];
    $fechaIni = $_POST['fic_fecha_inicial'];
    $fechaFin = $_POST['der_fecha_fin'];
    $centro = $_POST['cen_codigo'];

    //actualizar los datos
    $Actualizar = "UPDATE ficha SET fic_numero='$id', pro_codigo='$programa', fic_fecha_inicial='$fechaIni', der_fecha_fin='$fechaFin', cen_codigo='$centro' WHERE fic_numero='$codigo'";

    $resultado = mysqli_query($con,$Actualizar);
    if($resultado){
      header ("location:ficha.php");
    }else{
      echo "no actualizaron los datos";
    }

    
    ?>
    
  </body>

</html>

