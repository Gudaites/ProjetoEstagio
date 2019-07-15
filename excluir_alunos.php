<?php

require('funcoes.php');

$PDO = db_connect();

$matricula = $_GET["matricula"];

$sql = "DELETE FROM `alunos` WHERE matricula = :matricula";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':matricula', $matricula);

if ($stmt->execute())
{
    header('Location: alunos_cadastrados.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>