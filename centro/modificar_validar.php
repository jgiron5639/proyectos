<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Actualizado</title>
</head>

<body>
  <?php
  $con = mysqli_connect("localhost", "root", "", "db_desercion");

  include("../conexion.php");

  $id = $_POST['cen_codigo'];
  $codigo = $_POST['cen_codigo'];
  $nombre = $_POST['cen_descripcion'];
  $telefono = $_POST['cen_telefono'];
  $direccion = $_POST['cen_direccion'];
  $ciudad = $_POST['ciu_id'];

  //actualizar los datos
  $Actualizar = "UPDATE centro SET cen_codigo='$codigo', cen_descripcion='$nombre', cen_telefono='$telefono', cen_direccion='$direccion', ciu_id='$ciudad' WHERE cen_codigo='$id'";

  $resultado = mysqli_query($con, $Actualizar);
  if ($resultado) {
    header("location:centro.php");
  } else {
    echo "no actualizaron los datos";
  }


  ?>

</body>

</html>