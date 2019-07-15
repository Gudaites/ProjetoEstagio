<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <h2>CADASTRAR ALUNO EM UMA TURMA</h2>

        <form action="aluno_na_turma.php" method="POST">
            <div class="form-row">
                Aluno
                <?php
                    require("funcoes.php");
                    $con = db_connect();
                    $stmt = $con->query("SELECT * FROM alunos ORDER BY nome ASC");
                    $alunos = $stmt->fetchAll();
                ?>
                <select class="form-control" name="aluno" id="aluno" required>
                    <option value="" >Selecione Aluno</option>
                    <?php foreach ($alunos as $aluno) {
                        ?>
                        <option value="<?= $aluno['matricula'] ?>"><?= $aluno['nome'] ?></option>
                    <?php }
                    ?>
                </select>
                <br> Turma
                <br>
                <?php
                    $stmt = $con->query("SELECT * FROM turmas ORDER BY descricao ASC");
                    $turmas = $stmt->fetchAll();
                ?>
                <select class="form-control" name="turma" id="turma" required>
                <option value="" >Selecione Turma</option>
                    <?php foreach ($turmas as $turma) {
                        ?>
                        <option value="<?= $turma['numero_turma'] ?>"><?= $turma['descricao'] ?></option>
                    <?php }
                    ?>
                </select>

            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

    </div>
</main>

<?php
include("footer.php");
?>