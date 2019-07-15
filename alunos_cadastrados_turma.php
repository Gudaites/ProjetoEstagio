<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <h2>Alunos Cadastrados</h2>
        <?php
        require("funcoes.php");
        $con = db_connect();
        $numero_turma = $_GET['numero_turma'];
        $stmt = $con->prepare("SELECT * FROM alunos INNER JOIN alunos_turmas ON alunos_turmas.alunos_id = matricula WHERE alunos_turmas.turmas_id = :numero_turma ORDER BY nome ASC" );
        $stmt->bindParam(':numero_turma', $numero_turma);
        $stmt->execute();
        $alunos = $stmt->fetchAll();
        ?>
        <table class="table" >
            <thead class="bg-primary">
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Data Nascimento</th>
                    <th>Cidade</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno) { ?>
                    <tr>
                        <td><?= $aluno['matricula'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['sexo'] ?></td>
                        <td><?= date("d-m-Y", strtotime($aluno['data_nascimento'])) ?></td>
                        <td><?= $aluno['cidade'] ?></td>
                        <td><a class="btn btn-danger" href="exclui_aluno_turma.php?matricula=<?= $aluno['matricula'] ?>" >Excluir</a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include("footer.php");
?>