<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <h2>Turmas Cadastradas</h2>
        <?php
        require("funcoes.php");
        $con = db_connect();
        $stmt = $con->query("SELECT * FROM turmas ORDER BY descricao ASC");
        $turmas = $stmt->fetchAll();
        ?>
        <table class="table" >
            <thead class="bg-primary">
                <tr>
                    <th>Numero Turma</th>
                    <th>Descrição</th>
                    <th>Quantidade de vagas</th>
                    <th>Professor</th>
                    <th>Alunos</th>
                    <th>Excluir/Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmas as $turma) { ?>
                    <tr>
                        <td><?= $turma['numero_turma'] ?></td>
                        <td><?= $turma['descricao'] ?></td>
                        <td><?= $turma['qtd_vagas'] ?></td>
                        <td><?= $turma['nome_professor'] ?></td>
                        <td><a class="btn btn-primary" href="alunos_cadastrados_turma.php?numero_turma=<?= $turma['numero_turma'] ?>" >Alunos</a></td>
                        <td><a class="btn btn-danger" href="excluir_turmas.php?numero_turma=<?= $turma['numero_turma'] ?>" >Excluir</a> 
                        <a class="btn btn-success" href="editar_turma.php?matricula=<?= $turma['numero_turma'] ?>">Editar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include("footer.php");
?>