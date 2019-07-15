<?php

require('funcoes.php');

$nome = $_POST['nome'];
$data_nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$cidade= $_POST['cidade'] ?? null;
$bairro = $_POST['bairro'] ?? null;
$rua= $_POST['rua'] ?? null;
$numero= $_POST['numero'] ?? null;
$complemento= $_POST['complemento'] ?? null;

//insere no banco
$PDO = db_connect();

$sql = "INSERT INTO alunos(nome, data_nascimento, sexo, cidade, bairro, rua, numero, complemento)
VALUES (:nome, :data_nascimento, :sexo, :cidade, :bairro, :rua, :numero, :complemento)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':data_nascimento', $data_nascimento);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':complemento', $complemento);

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