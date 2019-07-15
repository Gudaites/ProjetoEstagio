<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <h2>Cadastro Aluno</h2>

        <form action="gravaAluno.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"
                    name="nome" id="nome" placeholder="Digite seu nome"  required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nascimento">Nascimento</label>
                    <input type="DATE" class="form-control" name="nascimento" id="nascimento" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="nome">Sexo</label><br>
                    <select class="form-control" name="sexo" id="sexo" required >
                        <option value="" >Selecione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                </div>
                <div class="form-group col-md-5">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                </div>
            </div>
            <div class="form-row">   
                <div class="form-group col-md-4">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua">
                </div>
                <div class="form-group col-md-4">
                    <label for="numero">Numero</label>
                    <input type="number" class="form-control" name="Numero" id="Numero" placeholder="Numero">
                </div>
                <div class="form-group col-md-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

    </div>
</main>

<?php
include("footer.php");
?>