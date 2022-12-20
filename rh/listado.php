<?php

include("../conexion.php");

$con = mysqli_connect("localhost", "root", "", "db_desercion");

$id = "SELECT * FROM rh";
?>

<body>
    <div>
        <table>
            <tr>
                <th> Codigo</th>
                <th> Nombre</th>
                <th> Siglas</th>
            </tr>
            <tr>
                <?php $resultado = mysqli_query($con, $id);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <td> <?php echo $row["rh_id"]; ?></td>
                    <td> <?php echo $row["rh_descripcion"]; ?></td>
                    <td> <?php echo $row["rh_descripcion"]; ?></td>
            </tr>
        <?php }
                mysqli_free_result($resultado); ?>
        </table>
    </div>