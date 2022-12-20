<?php

$con=mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");
$tipo_id = "SELECT * FROM tipo_id";
?>


<div class="container-table">
        <div class="table__title">Datos del Tipo de Identificacion</div>
        <div class="table__header">Nombre</div>
        <div class="table__header">Siglas</div>

        <?php $resultado = mysqli_query($con,$tipo_id);
        while($row=mysqli_fetch_assoc($resultado)) {?>
        <div class="table__item"><?php echo $row["tii_descripcion"];?></div>
        <div class="table__item"><?php echo $row["tii_sigla"];?></div>
        <?php } mysqli_free_result($resultado);?>
        </div>


