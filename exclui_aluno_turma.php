<?php

require('funcoes.php');

$PDO = db_connect();

$matricula = $_GET["matricula"];

$sql = "DELETE FROM `alunos_turmas` WHERE alunos_id = :matricula";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':matricula', $matricula);

if ($stmt->execute())
{
    header('Location: turmas_cadastradas.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>