<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');

$title="Relatório Gerado";
include('menu.php');
include_once('../modelo/conexao.php');


$ativo= $_POST['ativo'];
$dataInicial= $_POST['dataInicial'];
$dataFinal= $_POST['dataFinal'];
$marca= $_POST['marca'];
$tipo= $_POST['tipo'];
$user= $_POST['usuario'];
$tipoMov= $_POST['movimentacao'];

$sql="
    SELECT 
       (SELECT descricaoAtivo FROM ativo a WHERE a.idAtivo= m.idAtivo) as ativo,
       (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario= m.idUsuario) as usuario,
       (SELECT quantidadeAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) as quantidadeTotalAtivo,
        descricaoMovimentacao, 
        quantidadeMov, 
        quantidadeUso,
        statusMov, 
        tipoMovimentacao,
        localOrigem, 
        localDestino,
        `dataMovimentacao`


       FROM movimentacao m


        WHERE
        idAtivo is not null
";
    if($ativo != '' && $ativo != null){
        $sql.=" AND m.idAtivo=$ativo";
    }else{
        if($marca != '' && $marca != null){
            $sql.=" AND m.idAtivo in(SELECT idAtivo FROM ativo a WHERE a.idMarca=$marca)";
        }
        if($tipo != '' && $tipo != null){
            $sql.=" AND m.idAtivo in(SELECT idAtivo FROM ativo a WHERE a.idTipo=$tipo)";
        }

    }

    if($user != '' && $user != null){
        $sql.=" AND m.idUsuario=$user";
    }
    if($tipoMov != '' && $tipoMov != null){
        $sql.=" AND m.tipoMovimentacao='$tipoMov'";
    }

    if($dataInicial != '' && $dataInicial != null){
        $sql.=" AND m.dataMovimentacao>'$dataInicial'";
    }
    if($dataFinal != '' && $dataFinal != null){
        $sql.=" AND m.dataMovimentacao < '$dataFinal'";
    } 


    $result = mysqli_query($conexao, $sql) or die(false);
    $movimentacoes = $result->fetch_all(MYSQLI_ASSOC);
    
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.dataTables.css">
    <link rel="stylesheet" href="../css/resultadoRelatorio.css">
    <script src="../js/relatorios.js"></script>
    <title>Cadastro_ativos</title>
</head>

<body>

    <div class="container">
        <div class="grid-container">
            <h2><b>Relatório Gerado</b></h2>
            <button type="submit" class="btn btn-secondary"><a href="relatorios.php">Voltar</a></button>
        </div>
        <hr>
        <div class="container" id="tabelona">

            <table class="display" id="relatorio">
                <thead>
                    <tr>
                        <th scope="col">Ativo</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Qtd. Uso</th>
                        <th scope="col">Qtd. Antiga</th>
                        <th scope="col">Qtd. Total</th>
                        <th scope="col">Loc.Origem</th>
                        <th scope="col">Loc.Destino</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach($movimentacoes as $movimentacao){
        ?>
                    <tr>
                        <td><?php echo $movimentacao['ativo']; ?></td>
                        <td><?php echo $movimentacao['usuario']; ?></td>
                        <td><?php echo $movimentacao['tipoMovimentacao']; ?></td>
                        <td><?php echo $movimentacao['quantidadeUso']; ?></td>
                        <td><?php echo $movimentacao['quantidadeMov']; ?></td>
                        <td><?php echo $movimentacao['quantidadeTotalAtivo']; ?></td>
                        <td><?php echo $movimentacao['localOrigem']; ?></td>
                        <td><?php echo $movimentacao['localDestino']; ?></td>
                        <td><?php 
    $dataCadastro = $movimentacao['dataMovimentacao'];
    echo date('d/m/Y H:i:s', strtotime($dataCadastro)); 
    ?></td>
                        <td><?php echo $movimentacao['descricaoMovimentacao']; ?></td>

                    </tr>




                    <?php
}
?>
        </div>

        </tbody>
        </table>

        <input type="hidden" id="idMovimentacao" value="">

    </div>

    </div>
    <?php include('contrape.php'); ?>
</body>

</html>