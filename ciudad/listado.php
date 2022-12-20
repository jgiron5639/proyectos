<?php

$con = mysqli_connect("localhost", "root", "", "db_desercion");

include("../conexion.php");
$ciudad = "SELECT * FROM ciudad";

?>


<div>
        <table>
                <tr>
                        <th> Codigo</th>
                        <th> Nombre</th>
                        <th> Departamento</th>
                        <th> Cantidad de Habit.</th>
                </tr>
                <?php $resultado = mysqli_query($con, $ciudad);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                                <td> <?php echo $row["ciu_id"] ?></td>
                                <td> <?php echo $row["ciu_nombre"] ?></td>
                                <td> <?php echo $row["dep_codigo"] ?></td>
                                <td> <?php echo $row["ciu_cant_habitantes"] ?></td>
                        <?php }
                mysqli_free_result($resultado); ?>
                        </tr>
        </table>
</div>