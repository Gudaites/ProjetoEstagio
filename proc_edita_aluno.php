<?php

require('funcoes.php');
$con = db_connect();
$stmt = $con->query("SELECT * FROM alunos ORDER BY nome ASC");
$alunos = $stmt->fetch();
foreach ($alunos as $aluno) {
}

$matricula = $alunos['matricula'];
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

$sql = "UPDATE alunos SET
matricula = :matricula,
nome = :nome,
data_nascimento = :data_nascimento,
sexo = :sexo, 
cidade = :cidade,
bairro = :bairro,
rua = :rua,
numero = :numero,
complemento = :complemento
WHERE matricula = :matricula";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':matricula', $matricula);
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