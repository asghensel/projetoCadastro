<?php 
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include('inicio.php');


?>
<?php
include_once('modal_ativos.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroAtivo.css">
    <script src="../js/ativos.js"></script>
    <title>Cadastro_ativos</title>
</head>
<body>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Abrir Modal</button>

<div class="container">

<table class="table">
<thead>
  <tr>
    <th scope="col">Descrição</th>
    <th scope="col">Quantidade</th>
    <th scope="col">Marca</th>
    <th scope="col">Tipo</th>
    <th scope="col">Observação</th>
    
  </tr>

</div>
</body>
</html>