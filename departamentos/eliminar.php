<?php
include '../conexion.php';

$id = $_GET['id'];
    $eliminar = "DELETE FROM departamento WHERE dep_codigo='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:departamento.php");
    }else{
      echo "no se ha eliminado los datos";
    }

    ?>