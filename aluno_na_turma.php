<?php

require('funcoes.php');

$aluno = $_POST['aluno'];
$turma = $_POST['turma'];
$PDO = db_connect();
$vagas = $PDO->query("SELECT qtd_vagas, count(*) AS qtd_alunos_turma
FROM turmas 
INNER JOIN alunos_turmas ON alunos_turmas.turmas_id = turmas.numero_turma
WHERE turmas.numero_turma = $turma")->fetch();

if($vagas['qtd_vagas'] <= $vagas['qtd_alunos_turma']){
    echo"<script language='javascript' type='text/javascript'>
        alert('Limites de vagas ultrapassados');window.location
        .href='aluno_turma.php';</script>";
        die();
}

//insere no banco
$sql = "INSERT INTO alunos_turmas(alunos_id, turmas_id)
VALUES (:aluno, :turma)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':aluno', $aluno);
$stmt->bindParam(':turma', $turma);

if ($stmt->execute())
{
    echo"<script language='javascript' type='text/javascript'>
        alert('Adicionado com sucesso!');window.location
        .href='index.php';</script>";
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>