<?php

include("../conexion.php");
if (isset($_POST['submit'])) {
    if (strlen($_POST['codigo']) >= 1 && strlen($_POST['rh']) >= 1 && strlen($_POST['rh']) >= 1) {

        $cod = trim($_POST['codigo']);
        $rh = trim($_POST['rh']);



        $consulta = "INSERT INTO rh(rh_id, rh_descripcion) VALUES ('$cod', '$rh')";
        $resultado = mysqli_query($con, $consulta);

        if($resultado){
            ?>
            <?php
            include("rh.php");
            ?>
            <h1 class="ok">Registro exitoso</h1>
            <?php
        }else{
            ?>
    <?php
    include("rh.php");
    ?>
    <h1 class="bad">Error al enviar datos</h1>
    <?php
        }
    }
}
