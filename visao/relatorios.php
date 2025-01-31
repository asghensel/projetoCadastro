<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
$title="Relatórios";
include('menu.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$ativos=busca_info_bd($conexao,'ativo');
$marcas=busca_info_bd($conexao,'marca');
$tipos=busca_info_bd($conexao,'tipo');

$usuarios=busca_info_bd($conexao,'usuario');

// Consultar dados das movimentações
$sql = "SELECT
            m.idMovimentacao,
            m.idUsuario,
            m.idAtivo,
            m.localOrigem,
            m.localDestino,
            m.dataMovimentacao,
            m.descricaoMovimentacao,
            m.quantidadeUso,
            m.quantidadeMov,
            m.tipoMovimentacao,
            m.statusMov,
            (SELECT usuario FROM usuario u WHERE u.idUsuario = m.idUsuario) AS usuario,
            (SELECT descricaoAtivo FROM ativos a WHERE a.idAtivo = m.idAtivo) AS ativo
        FROM movimentacao m";

$result = mysqli_query($conexao, $sql) or die(false);
$movimentacoes = $result->fetch_all(MYSQLI_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/relatorios.css">
    <script src="../js/relatorio.js"></script>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Relatórios</title>
</head>
<body>
<div class="container">
    <h2>Informe os filtros que deseja gerar o relatório</h2>
    <form>
        <div class="grid-container">
            

            <div class="form-group">
                <label for="dataInicial">Data Inicial</label>
                <input type="date" class="form-control" id="dataInicial" required>
            </div>

            <div class="form-group">
                <label for="dataFinal">Data Final</label>
                <input type="date" class="form-control" id="dataFinal" required>
            </div>
            <div class="form-group">
                <label for="ativo">Ativo</label>
                <select class="form-select" id="ativo" name="ativo" required>
                    <option value="" selected>Todos Ativos</option>
                    <?php foreach($ativos as $ativo) {
                        echo '<option value="'.$ativo['idAtivo'].'">'.$ativo['descricaoAtivo'].'</option>';
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-select" id="marca" name="marca" required>
                    <option value="" selected>Todas Marcas</option>
                    <?php foreach($marcas as $marca) {
                        echo '<option value="'.$marca['idMarca'].'">'.$marca['descricaoMarca'].'</option>';
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="" selected>Todos Tipos</option>
                    <?php foreach($tipos as $tipo) {
                        echo '<option value="'.$tipo['idTipo'].'">'.$tipo['descricaoTipo'].'</option>';
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="usuario">Usuário Responsável</label>
                <select class="form-select" id="usuario"  name="usuario" required>
                    <option value=""  selected>Selecione</option>
                    <?php foreach($usuarios as $usuario) {
                        echo '<option value="'.$usuario['idUsuario'].'">'.$usuario['nomeUsuario'].'</option>';
                    } ?>
                </select>
            </div>
            </div>
            <div id="movimento">
                <label for="movimentacao">Tipo de Movimentação</label>
                <select class="form-select" id="movimentacao" name="movimentacao" required>
                    <option value="" selected>Selecione</option>
                    <?php foreach($movimentacoes as $movimentacao) {
                        echo '<option value="'.$movimentacao['idMovimentacao'].'">'.$movimentacao['tipoMovimentacao'].'</option>';
                    } ?>
                </select>
            </div>
        

        <div class="btn-group">
            <button type="submit" class="btn-primary">Gerar Relatório</button>
            <button type="reset" class="btn-secondary">Limpar filtros</button>
        </div>
    </form>
</div>
</body>
</html>