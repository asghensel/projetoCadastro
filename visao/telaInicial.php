<?php
include_once('cabecalho.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/inicio.css">
  <link rel="stylesheet" href="../css/navbar.css"> <!-- Estilo adicional da navbar -->
  <title>Página Inicial</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="inicio.php">Minha Aplicação</a>
    </div>
    <ul class="nav-links">
      <li><a href="inicio.php" class="btn">Início</a></li>
      <li><a href="usuarios.php" class="btn">Usuários</a></li>
      <li><a href="cadastrar.php" class="btn">Cadastrar</a></li>
      <li><a href="movimentacao.php" class="btn">Movimentação</a></li>
    </ul>
  </nav>

  <!-- Conteúdo principal -->
  <div class="container">
    <h1>Bem-vindo à Página Inicial</h1>
    <div class="grid">
      <a href="inicio.php" class="box btn-primary">
        <span>Início</span>
      </a>
      <a href="usuarios.php" class="box btn-primary">
        <span>Usuários</span>
      </a>
      <a href="cadastrar.php" class="box btn-primary">
        <span>Cadastrar</span>
      </a>
      <a href="movimentacao.php" class="box btn-primary">
        <span>Movimentação</span>
      </a>
    </div>
  </div>
</body>
</html>
