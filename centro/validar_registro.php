<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");

if (isset($_POST['submit'])) {
if (strlen($_POST['cen_codigo']) >= 1 &&
        strlen($_POST['cen_descripcion']) >= 1&&
        strlen($_POST['cen_telefono']) >= 1&&
        strlen($_POST['cen_direccion']) >= 1&&
        strlen($_POST['ciu_id']) >= 1){

    $cod = trim($_POST['cen_codigo']);
    $nombre = trim($_POST['cen_descripcion']);
    $tel = trim($_POST['cen_telefono']);
    $direccion = trim($_POST['cen_direccion']);
    $ciudad = trim($_POST['ciu_id']);


    $consulta = "INSERT INTO centro(cen_codigo, cen_descripcion, cen_telefono, cen_direccion, ciu_id) VALUES ('$cod', '$nombre', '$tel', '$direccion', '$ciudad')";
    $resultado = mysqli_query($con,$consulta);

    if($resultado){
        ?>
        <?php
        include("centro.php");
        ?>
        <h1 class="ok_centro">Registro exitoso</h1>
        <?php
    }else{
        ?>
    <?php
    include("centro.php");
    ?>
    <h1 class="bad_centro">Error al enviar datos</h1>
    <?php
    }
}

}