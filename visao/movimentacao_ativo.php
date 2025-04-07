<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
$title = "Movimentações";
include('menu.php');

include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');

$ativos = busca_info_bd($conexao, 'ativo');
$sql = "SELECT idMovimentacao, 
descricaoMovimentacao, 
quantidadeMov, 
quantidadeUso,
statusMov, 
tipoMovimentacao,
localOrigem, 
localDestino,
`dataMovimentacao`, 

(SELECT descricaoAtivo FROM ativo m WHERE m.idAtivo = a.idAtivo) as ativo, 
(SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario,
(SELECT quantidadeAtivo FROM ativo m WHERE m.idAtivo = a.idAtivo) as quantidadeTotalAtivo
FROM movimentacao a
Where statusMov = 'S'";


$result = mysqli_query($conexao, $sql) or die(false);
$movimentacoes = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/movimentacoes.css">
    <script src="../js/movimentacao.js"></script>
    <title>Cadastro_ativos</title>
</head>

<body>

    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="fechar_modal()"
            data-bs-target="#exampleModal" id="modal">Cadastrar Movimentação</button>

        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ativo</th>
                        <th class="ocultar" scope="col">Tipo</th>
                        <th class="ocultar" scope="col">Qtd. Uso</th>
                        <th class="ocultar" scope="col">Qtd. Antiga</th>
                        <th class="ocultar" scope="col">Qtd. Total</th>
                        <th class="ocultar" scope="col">Loc.Origem</th>
                        <th class="ocultar" scope="col">Loc.Destino</th>
                        <th class="ocultar" scope="col">Data</th>
                        <th class="ocultar" scope="col">Descrição</th>
                        <th class="info" scope="col">Ações</th> 


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($movimentacoes as $movimentacao) {
                        ?>
                        <tr>
                            <td><?php echo $movimentacao['ativo']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['tipoMovimentacao']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['quantidadeUso']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['quantidadeMov']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['quantidadeTotalAtivo']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['localOrigem']; ?></td>
                            <td class="ocultar"><?php echo $movimentacao['localDestino']; ?></td>
                            <td class="ocultar"><?php
                            $dataCadastro = $movimentacao['dataMovimentacao'];
                            echo date('d/m/Y H:i:s', strtotime($dataCadastro));
                            ?></td>
                            <td class="ocultar"><?php echo $movimentacao['descricaoMovimentacao']; ?></td>
                            <td class="info">
                            <div class="acoes" style="display: flex; justify-content: space-between;">
                                <div class="infos">
                                    <i class="bi bi-file-earmark-medical-fill" data-bs-target="#modalInfos" data-bs-toggle="modal"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Informações!"
                                       onclick="infos('<?php echo $movimentacao['idMovimentacao'] ?>')"></i>
                                </div>
                            </div>
                        </td>
                        </tr>




                        <?php
                    }
                    ?>
        </div>

        </tbody>
        </table>

        <input type="hidden" id="idMovimentacao" value="">

    </div>
    <?php
    include_once('modal_movimentacao.php');
    include_once('modal_mov.php');
    ?>
    </div>
    <?php 
    include_once('contrape.php');
    ?>
</body>

</html>