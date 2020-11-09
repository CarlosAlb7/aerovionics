<?php

  session_start();

  // if (isset($_SESSION['user_id'])) {
  //   header('Location: /aerovionics');
  // }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM ad WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /aerovionics/admin/admin.html");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMINISTRADOR</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php require 'header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>IniciO DE SESION</h1>
    <span>or <a href="signupadministrador.php">Registrar admin </a></span>
    <a href="signupgerencia.php">Registrar gerente </a></span>
    <a href="signupanalista.php">Registrar analista </a></span>
    <a href="signupusuario.php">Registrar usuario </a></span>
    

    <form action="loginadmin.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email" >
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
