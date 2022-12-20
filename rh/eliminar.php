<?php
include '../conexion.php';

$id = $_GET['rh_id'];
    $eliminar = "DELETE FROM rh WHERE rh_id='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:rh.php");
    }else{
      echo "No se ha eliminado los datos";
    }
    ?>