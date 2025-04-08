<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
$title = "Relatórios";
include('menu.php');

include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');



$ativos = busca_info_bd($conexao, 'ativo', 'statusAtivo', 'S');
$marcas = busca_info_bd($conexao, 'marca', 'statusMarca', 'S');
$tipos = busca_info_bd($conexao, 'tipo', 'statusTipo', 'S');
$usuarios = busca_info_bd($conexao, 'usuario');

$movimentacoes = busca_info_bd($conexao, 'movimentacao');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/relatorios.css">
    <script src="../js/relatorio.js"></script>

    <title>Relatórios</title>
</head>

<body>
    <div class="container">
        <div class="cabecalho">
        <h2>Informe os filtros que deseja gerar o relatório</h2>
        </div>
        <form action="resultado_relatorios.php" method="post" >
            <div class="grid-container">


                <div class="form-group">
                    <label for="dataInicial">Data Inicial</label>
                    <input type="date" class="form-control" id="dataInicial" name="dataInicial">
                </div>

                <div class="form-group">
                    <label for="dataFinal">Data Final</label>
                    <input type="date" class="form-control" id="dataFinal" name="dataFinal">
                </div>
                <div class="form-group">
                    <label for="ativo">Ativo</label>
                    <select class="form-select" id="ativo" name="ativo">
                        <option value="" selected>Todos Ativos</option>
                        <?php foreach ($ativos as $ativo) {
                            echo '<option value="' . $ativo['idAtivo'] . '">' . $ativo['descricaoAtivo'] . '</option>';
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select class="form-select" id="marca" name="marca">
                        <option value="" selected>Todas Marcas</option>
                        <?php foreach ($marcas as $marca) {
                            echo '<option value="' . $marca['idMarca'] . '">' . $marca['descricaoMarca'] . '</option>';
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo">
                        <option value="" selected>Todos Tipos</option>
                        <?php foreach ($tipos as $tipo) {
                            echo '<option value="' . $tipo['idTipo'] . '">' . $tipo['descricaoTipo'] . '</option>';
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="usuario">Usuário Responsável</label>
                    <select class="form-select" id="usuario" name="usuario">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($usuarios as $usuario) {
                            echo '<option value="' . $usuario['idUsuario'] . '">' . $usuario['nomeUsuario'] . '</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div id="movimento">
                <label for="movimentacao">Tipo de Movimentação</label>
                <select class="form-select" id="movimentacao" name="movimentacao">
                    <option value="" selected>Selecione</option>
                    <option value="remover">Remover</option>
                    <option value="realocar">Realocar</option>
                    <option value="adicionar">Adicionar</option>
                </select>
            </div>


            <div class="btn-group">
                <button type="submit" class="btn-primary" id="salvar_info">Gerar Relatório</button>
                <button type="reset" class="btn-secondary">Limpar filtros</button>
            </div>





        </form>
    </div>
    <?php include('contrape.php'); ?>
</body>

</html>