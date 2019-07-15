<?php

require('funcoes.php');

$PDO = db_connect();

$numero_turma = $_GET["numero_turma"];

$sql = "DELETE FROM `turmas` WHERE numero_turma = :numero_turma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':numero_turma', $numero_turma);

if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>