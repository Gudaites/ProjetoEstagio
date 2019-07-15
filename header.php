<?php
SESSION_START();
if(basename($_SERVER['REQUEST_URI'], '.php') != 'login' && !isset($_SESSION['usuario']) ){
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <title>Gestão Escolar</title>
</head>
<body>
<header class="cabecalho">
        <h1>Gestão Escolar</h1>
        <h2>Prefeitura de São Leopoldo</h2>
</header>