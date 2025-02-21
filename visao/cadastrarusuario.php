<?php 
include_once('cabecalho.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrousuario.css">
    <script src="../js/cadastrousuario.js"></script>
    <title>Cadastro Usuario</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-header">
                <img src="../midia/logologin.jpg" alt="Logo Senac" class="header-logo">
            </div>
            <div class="form-value">
                <form action="../controle/cadastrar_usuario_controle.php" method="post" id="formulario"
                    onsubmit="return validarSenha()">
                    <h2>Cadastro</h2>
                    <div class="inputbox">
                        <input type="text" class="form-control" id="nome" placeholder="" name="nome" required>
                        <label for="nome" class="form-label">Nome Completo</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" class="form-control" id="turma" placeholder=" " name="turma" required>
                        <label for="turma" class="form-label">Turma do Usuário</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required>
                        <label for="usuario" class="form-label">Usuário</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" class="form-control" id="senha" placeholder="" name="senha" required>
                        <label for="senha" class="form-label">Senha do Usuário</label>
                    </div>
                    <p id="mensagem"></p>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
                <p> Já tem uma conta? <a href="login_usuario.php">Login</a></p>
            </div>
        </div>
    </section>
</body>

</html>