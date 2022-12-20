<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Actualizado</title>
</head>

<body>
  <?php

  include("../conexion.php");

  $id = $_POST['rh_id'];
  $codigo = $_POST['rh_id'];
  $nombre = $_POST['rh_descripcion'];



  //actualizar los datos
  $actualizar = "UPDATE rh SET rh_id='$codigo', rh_descripcion='$nombre' WHERE rh_id='$id'";

  $resultado = mysqli_query($con, $actualizar);
  if ($resultado) {
    header("location:rh.php");
  } else {
    echo "No actualizaron los datos";
  }


  ?>

</body>

</html>