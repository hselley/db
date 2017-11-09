<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Desplegado</title>
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

      // Formar el query
      $sql = "SELECT * FROM Personas";

      // Realizar la consulta en la BD
      $result = mysqli_query($con, "SELECT * FROM Personas");

      // Cerrar conexión
      mysqli_close($con);
    ?>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron text-center">
        <h1>Registro de Usuarios</h1>
        <h2>Información de los usuarios registrados</h2>
      </div>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Edad</th>
            <th>Fecha Ingreso</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
