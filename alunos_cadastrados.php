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
        if(isset($_POST['env']) && $_POST['env'] == "envBusca"){
                $stmt = $con->prepare('SELECT * FROM alunos WHERE nome LIKE :nome
                OR sexo LIKE :nome  OR matricula LIKE :nome ORDER BY nome ASC');
                $stmt->bindValue(':nome', "%" . $_POST['nome'] . "%");
                $stmt->execute();
            
        }else{
            $stmt = $con->query("SELECT * FROM alunos ORDER BY nome ASC");
        }
        $alunos = $stmt->fetchAll();
        ?>
    <form method="POST" class="form-inline">
        <input type="text" name="nome" class="form-control col-sm-5" placeholder="Digite sua Busca"/>
        <input type="submit" class="btn btn-primary" value="Buscar" />
        <input type="hidden" name="env" value="envBusca">
    </form>
        <table class="table" >
            <thead class="bg-primary">
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Data Nascimento</th>
                    <th>Cidade</th>
                    <th>Excluir/Editar</th>
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
                        <td><a class="btn btn-danger" href="excluir_alunos.php?matricula=<?= $aluno['matricula'] ?>" >Excluir</a> 
                        <a class="btn btn-success" href="editar_aluno.php?matricula=<?= $aluno['matricula'] ?>">Editar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include("footer.php");
?>