<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

if (isset($_POST['inscribir'])) {
    if (strlen($_POST['ciu_id']) >= 1 &&
    strlen($_POST['ciu_nombre']) >= 1&&
    strlen($_POST['dep_codigo']) >= 1&&
    strlen($_POST['ciu_cant_habitantes']) >= 1){

    $cod = ($_POST['ciu_id']);
    $nombre = ($_POST['ciu_nombre']);
    $departamento = ($_POST['dep_codigo']);
    $cantidad= ($_POST['ciu_cant_habitantes']);


    $consulta = "INSERT INTO ciudad (ciu_id, ciu_nombre, dep_codigo, ciu_cant_habitantes) VALUES ('$cod', '$nombre', '$departamento', '$cantidad')";
    $resultado = mysqli_query($con,$consulta);
     if($resultado){
        ?>
        <?php
        include("ciudad.php");
        ?>
        <h1 class="ok_ciudad">Registro exitoso</h1>
        <?php
    }else{
        ?>
        <?php
        include("ciudad.php");
        ?>
        <h1 class="bad_ciudad">Error al enviar datos</h1>
        <?php
    }}
        }



