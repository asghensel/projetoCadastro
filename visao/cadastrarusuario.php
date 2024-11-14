<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../js/cadastrousuario.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrousuario.css">
  
    <title>Cadastro_Usuário</title>
</head>
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
</html>