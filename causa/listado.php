<?php
include("../conexion.php");
$cad = "SELECT * FROM causa_desercion";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Estilos css/style.css">

</head>

<body>
    <div class="container-table">
        <div class="table__title">Datos de causa de desercion</div>
        <div class="table__header">Codigo</div>
        <div class="table__header">Causa</div>
        <div class="table__header">Estado de la matricula</div>
        <?php $resultado = mysqli_query($con, $cad);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
            <div class="table__item"><?php echo $row["cad_codigo"]; ?></div>
            <div class="table__item"><?php echo $row["cad_descripcion"]; ?></div>
            <div class="table__item"><?php echo $row["cad_mat_estado"]; ?></div>
        <?php }
        mysqli_free_result($resultado); ?>
    </div>
</body>

</html>