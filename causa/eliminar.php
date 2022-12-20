<?php
include '../conexion.php';

$id = $_GET['cad_codigo'];
    $eliminar = "DELETE FROM causa_desercion WHERE cad_codigo='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:causa.php");
    }else{
      echo "no se ha eliminado los datos";
    }

    ?>