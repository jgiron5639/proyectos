<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Actualizado</title>
</head>

<body>
  <?php

  include("../conexion.php");

  $id = $_POST['pro_codigo'];
  $codigo = $_POST['pro_codigo'];
  $nombre = $_POST['pro_descripcion'];
  $estado = $_POST['pro_estado'];


  //actualizar los datos
  $actualizar = "UPDATE programa SET pro_codigo='$codigo', pro_descripcion='$nombre', pro_estado='$estado' WHERE pro_codigo='$id'";

  $resultado = mysqli_query($con, $actualizar);
  if ($resultado) {
    header("location:programa.php");
  } else {
    echo "No actualizaron los datos";
  }


  ?>

</body>

</html>