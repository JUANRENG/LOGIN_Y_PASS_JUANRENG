<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Plan de Negocio');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Plan de Negocio");
    } else {
      $message = 'Lo siento esos datos no coinciden';
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
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
    <title>Login</title>
</head>
<body>

    <form class="formulario" action="login.php" method="POST">

        <h1>Login</h1>
        <div class="contenedor"></div>

          <div class="input-contenedor">
          <input name="email" type="text" placeholder="Correo Electronico" required>
          </div>

          <div class="input-contenedor">
          <input name="password" type="password" placeholder="Contraseña" required>
          </div>

        <input type="submit" value="Registro" class="button"></input>

        <p>Al, registrarse aceptas nuestras condiciones de uso y politica de privacidad.</p>

        <p>¿Tienes cuenta?<a class="link" href="Registro.php">Iniciar Registro</a></p>


    </form>
    
</body>
</html>