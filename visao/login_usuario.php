<?php

session_start();
include_once('cabecalho.php');
if(isset($_GET['erro']) && $_GET['erro'] =='acesso_negado'){
  ?>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Acesso negado!",
        text: "Você precisa primeiro fazer seu Login.",
        background: "#F5F5F5",
        color: "#333",
        confirmButtonColor: "#ff4757",
        showConfirmButton: false,
        timer: 2000 
    }).then(() => {
      setTimeout(() => {
    window.location.href = "login_usuario.php";
}, 3000);
    });
});
</script>
  <?php
}
if(isset($_GET['error_auten']) && $_GET['error_auten']=='s'){
  echo "<script>alert('Senha ou usuario invalido!');</script>";
}
include_once('../modelo/conexao.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/loginUsuario.css">
  <title>Login</title>
</head>

  

<body>
<section>
    <div class="form-box">
        <!-- Cabeçalho com imagem -->
        <div class="form-header">
            <img src="../midia/logologin.jpg." alt="Logo Senac" class="header-logo">
        </div>

        <div class="form-value">
            <h2>Login</h2>
            <form action="../controle/login_usuario_controle.php" method="post" id="formulario">
      <div class="inputbox">
    
    <input type="text"  class="form-control" id="nome"  name="usuario" required >
    <label for="nome" class="form-label">Nome Usuario</label>
  </div>
  <div class="inputbox">
    
    <input type="password" class="form-control" id="senha"  name="senha" required >
    <label for="senha" class="form-label">Senha</label>
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
           
                <p> Não tem uma conta? <a href="cadastrarusuario.php" >Cadastro</a></p>      
                
                
                
        </div>
    </div>
</section>
</body>
</html>


