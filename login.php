<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
include("header.php");
?>
<main class="principal">
    <div class="conteudo">
        <h2>Login</h2>
        <div class="row justify-content-md-center">
            <form action="proc_login.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="usuario">Usuário</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    <input type="submit" value="entrar" id="entrar" name="entrar"><br>
            </form>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>