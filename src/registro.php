<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
      // Conectar con la BD
      $con = mysqli_connect("localhost", "geeker", "selley", "miBD");

      // Verificar conexión
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      // Si la conexión pudo hacerse
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los valores del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $fecha = $_POST['nacimiento'];
        $edad = $_POST['edad'];

        // Formar el query
        $sql = "INSERT INTO Personas (nombre, apellido, correo, edad, fecha)
          VALUES ('$nombre', '$apellido', '$correo', '$edad', '$fecha')";

        // Insertar los valores del formulario en la Tabla de la BD
        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }

        // Cerrar conexión
        mysqli_close($con);
      }
      // Si la conexión no pudo hacerse
      else {
        // Si el formulario está vacio se guarda nulo en las variables php
        $nombre = null;
        $apellido = null;
        $correo = null;
        $fecha = null;
        $edad = null;
      }
    ?>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron text-center">
        <h1>Registro de Usuarios</h1>
        <h2>Ingrese la información solicitada</h2>
      </div>
      <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <label for="number">Nombre:</label>
          <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
        </div>
        <div class="form-group">
          <label for="number">Apellido:</label>
          <input type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido">
        </div>
        <div class="form-group">
          <label for="number">Correo:</label>
          <input type="email" class="form-control" name="correo" placeholder="Ingrese su correo">
        </div>
        <div class="form-group">
          <label for="number">Edad:</label>
          <input type="number" class="form-control" name="edad" placeholder="Ingrese su edad">
        </div>
        <div class="form-group">
          <label for="number">Fecha de Ingreso:</label>
          <input type="date" class="form-control" name="nacimiento" placeholder="Ingrese su fecha de nacimiento">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
  </body>
</html>
