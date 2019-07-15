<?php

require('funcoes.php');
$con = db_connect();
$stmt = $con->query("SELECT * FROM turmas ORDER BY descricao ASC");
$turmas = $stmt->fetch();
foreach ($turmas as $turma) {
}

$numero_turma = $turmas['numero_turma'];
$descricao = $_POST['descricao'];
$qtd_vagas = $_POST['qtd_vagas'];
$nome_professor = $_POST['nome_professor'];

//insere no banco
$PDO = db_connect();

$sql = "UPDATE turmas SET
numero_turma = :numero_turma,
descricao = :descricao,
qtd_vagas = :qtd_vagas,
nome_professor = :nome_professor
WHERE numero_turma = :numero_turma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':numero_turma', $numero_turma);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':qtd_vagas', $qtd_vagas);
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