<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style>

        body
         {text-align: center;}

        input
         {text-align: center;}

    </style>


    <link rel="stylesheet" type="text/css" href="3estilos.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>


    <form class="formulario" action="Registro.php" method="POST">

        <h1>Registro</h1>
        <div class="contenedor"></div>

          <div class="input-contenedor">
          <input name="name" type="text" placeholder="Nombre de Usuario" required></input>
          </div>

          <div class="input-contenedor">
          <input name="email" type="text" placeholder="Correo Electronico" required></input>
          </div>

          <div class="input-contenedor">
          <input name="password" type="password" placeholder="Contraseña" required></input>
          </div>

        <input type="submit" value="Registro" class="button"></input>

        <p>Al, registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>

        <p>¿Tienes cuenta?<a class="link" href="login.php">Iniciar Sesión</a></p>


    </form>
    
</body>
</html>