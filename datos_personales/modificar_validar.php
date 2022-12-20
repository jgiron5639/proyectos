<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Actualizado</title>
</head>

<body>
  <?php
  $con = mysqli_connect("localhost", "root", "", "db_desercion");

  include("../conexion.php");

  $id = $_POST['apr_id'];
  $nombre = $_POST['apr_nombre'];
  $apellido = $_POST['apr_apellido'];
  $codigo = $_POST['apr_id'];
  $tipo_id = $_POST['tii_id'];
  $rh = $_POST['rh_id'];
  $genero = $_POST['apr_genero'];
  $edad = $_POST['apr_edad'];
  $telefono = $_POST['apr_telefono'];
  $ciudad = $_POST['ciu_id'];

  //actualizar los datos
  $Actualizar = "UPDATE aprendiz SET apr_id='$codigo', apr_nombre='$nombre', apr_apellido='$apellido', tii_id='$tipo_id', rh_id='$rh', apr_genero='$genero', apr_edad='$edad', apr_telefono='$telefono', ciu_id='$ciudad' WHERE apr_id='$id'";

  $resultado = mysqli_query($con, $Actualizar);
  if ($resultado) {
    header("location:datos.php");
  } else {
    echo "no actualizaron los datos";
  }


  ?>

</body>

</html>