<?php
require('funcoes.php');
session_start();
$login = $_POST['usuario'];
$entrar = $_POST['entrar'];
$senha = ($_POST['senha']);

  if (isset($entrar)) {
    $con = db_connect();
    $verifica = $con->query("SELECT * FROM usuarios WHERE login = 
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if ($verifica->rowCount() <=0 ) {
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }else{
        $_SESSION['usuario'] = $login;
        header("Location:index.php");
      }
  }
?>