<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Actualizado</title>
</head>

<body>
  <?php

  include("../conexion.php");

  $id = $_POST['ciu_id'];
  $codigo = $_POST['ciu_id'];
  $nombre = $_POST['ciu_nombre'];
  $dep = $_POST['dep_codigo'];
  $habit = $_POST['ciu_cant_habitantes'];


  //actualizar los datos
  $Actualizar = "UPDATE ciudad SET ciu_id='$codigo', ciu_nombre='$nombre', dep_codigo='$dep', ciu_cant_habitantes='$habit' WHERE ciu_id='$id'";

  $resultado = mysqli_query($con, $Actualizar);
  if ($resultado) {
    header("location:ciudad.php");
  } else {
    echo "no actualizaron los datos";
  }


  ?>

</body>

</html>