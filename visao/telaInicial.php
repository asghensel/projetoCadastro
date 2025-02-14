<?php
include_once('cabecalho.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/inicio.css">
  <title>Página Inicial</title>
</head>
<body>
  <!-- Navbar -->
  <nav>
    <ul>
      <div class="navbar">
        <li><img src="../midia/senac_logo_branco.png"></li>
        <li id="logout">
          <div class="navbar-item">
            <a class="logout-link" onclick="logoutUser()">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </li>
      </div>
    </ul>
  </nav>

  <!-- Conteúdo principal -->
  <h1>Bem-vindo à Página Inicial</h1>
  <div class="container">
    
 

<div class="box1">
<p>A turma 13 do curso de TI do Senac Santa Cruz, foi desafiada à participar de um projeto onde se consistia em cadastrar todos os ativos da sala, ou seja, criar um patrimônio dos recursos da
  sala 205(ferramentas, hardwares, periféricos, etc). O projeto consistia em nós recuperarmos os ativos que foram atingidos pela enchente, onde tivemos que desmontá-los, limpá-los e testarmos 
  cada um deles para ver quais ainda funcionavam e quais devíamos mandar para descarte, os que funcionavam nós identificamos, e após isso separá-los em caixas e alocalos em locais identificados,
  cadastrando tudo em um protótipo de site feito pelo professor Rafael Frantz . O processo foi longo e batalhador, ficamos no periódo de 17 de julho até 23 de agosto trabalhando no projeto
</p>





</div>



<div class="box2">

<div class="linha2">
      <a class="button" href="#" role="button" id="login">
        <span>Login</span>
        <div class="icon">
          <i class="fa fa-user"></i>
          <i class="fa fa-check"></i>
        </div>
      </a>

      <a class="button" href="#" role="button" id="cadastro">
        <span>Cadastro</span>
        <div class="icon">
          <i class="fa fa-address-card-o"></i>
          <i class="fa fa-check"></i>
        </div>
      </a>
      </div>
<div class="linha2">
      <a class="button" href="#" role="button" id="usuario">
        <span>Usuários</span>
        <div class="icon">
          <i class="fa fa-users"></i>
          <i class="fa fa-check"></i>
        </div>
      </a>

      <a class="button" href="#" role="button" id="ativos">
        <span>Ativos</span>
        <div class="icon">
          <i class="fa fa-desktop"></i>
          <i class="fa fa-check"></i>
        </div>
      </a>

      <a class="button" href="#" role="button" id="movimentacoes">
        <span>Movimentações</span>
        <div class="icon">
          <i class="fa fa-cog"></i>
          <i class="fa fa-check"></i>
        </div>
      </a>

        </div>      
      </div>
  </div>
</body>
<script>
  removeSuccess = ->
  $('.button').removeClass 'success'

$(document).ready ->
  $('.button').click ->
    $(@).addClass 'success'
    setTimeout removeSuccess, 3000
</script>

</html>


