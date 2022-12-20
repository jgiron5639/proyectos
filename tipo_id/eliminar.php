<?php
include '../conexion.php';

$id = $_GET['tii_id'];
    $eliminar = "DELETE FROM tipo_id WHERE tii_id='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:tipo_id.php");
    }else{
      echo "No se ha eliminado los datos";
    }

    ?>