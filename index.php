<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html lang="es">
<head>

    <style>

        h3
        {text-align: center;}
    
        p
        {color: black;
        background: lightskyblue;
        margin-top: 150px;
        margin: 100px auto;
        font-size: 12px;
        width: 30%;
        padding: 20px;
         border: none;
         text-align: center;
         }
    </style>


	<link rel="stylesheet" type="text/css" href="4estilopagina.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de Negocio</title>
</head>
<body>
    
<?php if(!empty($user)): ?>

      <a class="link" href="Logout.php">
      "presione aqui para salir"
      </a>
      
    <?php else: ?>

     

    <?php endif; ?>
  </body>
</html>

<br><a class="link" href="Login.php">"Salir"</a><br>
<div class="four columns">
<h3>Diseño instrumental de estrategias y aplicaciones sistematizadas para el fortalecimiento del novel inversionista</h3>
</div>


<p>objetivos del proyecto: Diseñar instrumentalmerte estrategias mercantiles y aplicaciones sistemazidas del novel inversionista.</p>

<p>Objectivos especificos:  Indentificas los instrumentos mercantiles estrategicos destinados al fortalecimiento del novel inversionistas;
   Analizar los instrumentos mercantiles destinados al fortalecimeinto del novel inversionista;
   Formular las aplicaciones sistematizadas para el fortalecimiento del novel inversionista.
</p>

<p>Alcanse: Con la implementación estrategica del presente proyecto, se pretende brindar a todo aquel nuevo emprendedor o inversionista, una herramienta sencilla sistematica y dinámica capaz de afianzar, impulsar y desarrollar de manera efectiva sus ideas, basadas en el conocimiento de su realidad económica, a su vez brindando un soporte técnico inductivo y practico, bajo un enfoque tecnológico amplio e impulsor para la aplicación de estrategias mercantiles fundamentadas y afianzadas en preceptos administrativos, con una orientación prospectiva, basada en una visión gerencial innovadora y futurista, destinada mejorar el presente de manera evolutiva y confiable.</p>
   

</body>

</html>>
</html>