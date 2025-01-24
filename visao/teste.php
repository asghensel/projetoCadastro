<?php
session_start();
if(isset($_GET['erro']) && $_GET['erro'] =='acesso_negado'){
  echo "<script>alert('Usuario não autenticado'); </script>";
}
if(isset($_GET['error_auten']) && $_GET['error_auten']=='s'){
  echo "<script>alert('Senha ou usuario invalido!');</script>";
}

include_once('../modelo/conexao.php');
include_once('cabecalho.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teste.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<body>

<section>
    <div class="form-box">
        <!-- Cabeçalho com imagem -->
        <div class="form-header">
            <img src="../midia/logologin.jpg" alt="Logo Senac" class="header-logo">
        </div>

        <div class="form-value">
            <h2>Login</h2>
            <form action="../controle/login.cadastro_controle.php" method="post">

                

                <div class="inputbox">
                    <input name="user" type="text" id="validationCustomUsername" placeholder=" " required>
                    <label for="validationCustomUsername">Usuário</label>
                </div>

               

                <div class="inputbox">
                    <input name="senha" type="password" id="inputPassword6" placeholder=" " required>
                    <label for="inputPassword6">Senha</label>
                </div>

                <div class="forget">
                    <label>
                        <input type="checkbox" id="invalidCheck2" required>
                        Concordo com os termos e condições
                    </label>
                </div>
                
                <div>
                <button class="bt" type="submit">Entrar</button>
                </div>
  
            </form>
           
                <p> Não tem uma conta? <a href="cadastro_user.php" >cadastrar</a></p>      
                
                
                
        </div>
    </div>
</section>

</body>
</html>