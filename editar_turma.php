<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <?php
        require("funcoes.php");
        $con = db_connect();
        $stmt = $con->query("SELECT * FROM turmas");
        $turmas = $stmt->fetchAll();
        foreach ($turmas as $turma) { }
        ?>
        <h2>Editar turma selecionada</h2>

        <form method="POST" action="proc_edita_turma?numero_turma=<?= $turma['numero_turma'] ?>">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="descricao">Descrição turma</label>
                    <textarea rows="4" cols="50" class="form-control" name="descricao" id="descricao" required placeholder="Digite a descrição da turma"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="quantidadeVagas">Quantidade de vagas</label>
                    <input type="number" class="form-control" name="qtd_vagas" id="qtd_vagas" required placeholder="Numero de Vagas" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nome_professor">Nome Professor</label>
                    <input type="text" class="form-control" name="nome_professor" id="nome_professor" placeholder="Digite o nome do Professor" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

    </div>
</main>

<?php
include("footer.php");
?>