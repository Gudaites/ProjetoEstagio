<?php

require('funcoes.php');

$descricao = $_POST['descricao'];
$quantidadeVagas = $_POST['qtd_vagas'];
$nome_professor = $_POST['nome_professor'];

//insere no banco
$PDO = db_connect();

$sql = "INSERT INTO turmas(descricao, qtd_vagas, nome_professor)
VALUES (:descricao, :qtd_vagas, :nome_professor)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':qtd_vagas', $quantidadeVagas);
$stmt->bindParam(':nome_professor', $nome_professor);

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