<?php
include ('../conexion.php');

$id = $_GET['pro_codigo'];
    $eliminar = "DELETE FROM programa WHERE pro_codigo='$id'";
    $resultadoEli = mysqli_query($con,$eliminar);
    if($resultadoEli){
      header("location:programa.php");
    }else{
      echo "No se ha eliminado los datos";
    }

    ?>