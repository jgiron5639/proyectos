<?php
include ('../conexion.php');

$id = $_GET['cen_codigo'];
    $eliminar = "DELETE FROM centro WHERE cen_codigo='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:centro.php");
    }else{
      echo "no se ha eliminado los datos";
    }

    ?>