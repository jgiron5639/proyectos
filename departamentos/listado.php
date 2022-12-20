<?php
include("../conexion.php");
$departamento = "SELECT * FROM departamento";
?>
<div>
        <table>
                <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                </tr>
                <?php $resultado = mysqli_query($con, $departamento);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                                <td> <?php echo $row["dep_codigo"]; ?></td>
                                <td> <?php echo $row["dep_nombre"]; ?></td>
                                <td> <?php }
                                mysqli_free_result($resultado); ?></td>
                        </tr>
        </table>
</div>