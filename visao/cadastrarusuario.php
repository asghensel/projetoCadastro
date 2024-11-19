<?php 
include_once('cabecalho.php');
?>


<body>
  <div class="container">
<form action="../controle/cadastrar_usuario_controle.php" method="post" id="formulario" onsubmit="return validarSenha()">
  
  <div class="box">
  <h1 id="title">Cadastro Usuário</h1>
      <div class="mb-2">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text"  class="form-control" id="nome" placeholder="Coloque seu nome aqui" name="nome" required>
  </div>
  <div class="mb-2">
    <label for="turma" class="form-label">Turma do Usuário</label>
    <input type="text" class="form-control" id="turma" placeholder="Coloque sua turma aqui" name="turma" required>
  </div>
  <div class="mb-2">
    <label for="usuario" class="form-label">Usuário</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu nome de Usuário aqui" required>
  </div>
  <div class="mb-2">
    <label for="senha" class="form-label">Senha do Usuário</label>
    <input type="text" class="form-control" id="senha" placeholder="Coloque sua senha aqui" name="senha" required>
  </div>
  <p id="mensagem"></p>
  <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>


</div>

</body>
