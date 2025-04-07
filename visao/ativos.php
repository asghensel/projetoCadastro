<?php 
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include('menu.php');

include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');

$marcas = busca_info_bd($conexao, 'marca');
$tipos  = busca_info_bd($conexao, 'tipo');

$sql = "SELECT 
          idAtivo, 
          descricaoAtivo, 
          quantidadeAtivo, 
          observacaoQuant,
          quantidadeMinima,
          statusAtivo, 
          observacaoAtivo, 
          dataCadastroAtivo, 
          urlImagem,
          (SELECT descricaoMarca FROM marca m WHERE m.idMarca = a.idMarca) as marca,
          (SELECT descricaoTipo FROM tipo t WHERE t.idTipo = a.idTipo) as tipo,  
          (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) as usuario,
          (SELECT quantidadeUso FROM movimentacao q WHERE q.idAtivo = a.idAtivo and q.statusMov='S') AS quantidadeUso
        FROM ativo a";

$result = mysqli_query($conexao, $sql) or die(false);
$ativos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/cadastroAtivo.css">
    <!-- Script dos ativos -->
    <script src="../js/ativos.js"></script>
    <title>Cadastro de Ativos</title>
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="fechar_modal()"
            data-bs-target="#exampleModal" id="modal">Cadastrar Modal</button>

        <form method="GET" action="../controle/buscarProdutos.php" class="form-busca">
            <input type="text" name="busca" placeholder="Buscar produto no Mercado Livre" required>
            <button type="submit">Buscar</button>
        </form>

        <div class="container" id="form">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Descrição</th>
                        <th class="ocultar" scope="col">Quantidade</th>
                        <th class="ocultar" scope="col">Quantidade Disp</th>
                        <th class="ocultar" scope="col">Marca</th>
                        <th class="ocultar" scope="col">Tipo</th>
                        <th class="ocultar" scope="col">Imagem</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ativos as $ativo) { 
                        $alertaQntd = ($ativo['quantidadeAtivo'] - $ativo['quantidadeUso']);
                    ?> ??
                    <tr>
                        <td ><?php echo $ativo['descricaoAtivo']; ?></td>
                        <td id="quantia" class="ocultar"><?php echo $ativo['quantidadeAtivo']; ?></td>
                        <td class="ocultar">
                            <?php echo $alertaQntd; ?>
                            <?php if ($alertaQntd < $ativo['quantidadeMinima']) { ?>
                                <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png" alt="Alerta" 
                                     style="width: 20px; height: 20px; margin-left: 10px;"
                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade abaixo do mínimo!">
                            <?php } ?>
                        </td>
                        <td class="ocultar"><?php echo $ativo['marca']; ?></td>
                        <td class="ocultar"><?php echo $ativo['tipo']; ?></td>
                        <td class="ocultar">
                            <button data-bs-target="#modalImagens" data-bs-toggle="modal" type="button" id="modalImg"
                                    onclick="verImagem('<?php echo $ativo['urlImagem']; ?>')">
                                <img src="http://localhost:8080/<?php echo $ativo['urlImagem']; ?>" 
                                     style="width: 90px; height: 90px; margin:auto;" id="imagemGrande">
                            </button>
                        </td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-between;">
                                <div class="muda_status">
                                    <?php if ($ativo['statusAtivo'] == "S") { ?>
                                        <div class="inativo" onclick="muda_status('N', '<?php echo $ativo['idAtivo'] ?>')">
                                            <i class="bi bi-toggle-on" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar Status!"></i>
                                        </div>
                                    <?php } else { ?>
                                        <div class="ativo" onclick="muda_status('S', '<?php echo $ativo['idAtivo'] ?>')">
                                            <i class="bi bi-toggle-off" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar Status!"></i>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="edit">
                                    <i class="bi bi-pencil-square" onclick="editar('<?php echo $ativo['idAtivo'] ?>')"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Ativo!"></i>
                                </div>
                                <div class="trash">
                                    <i class="bi bi-trash" onclick="deletar('<?php echo $ativo['idAtivo'] ?>')"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Deletar Ativo!"></i>
                                </div>
                                <div class="infos">
                                    <i class="bi bi-file-earmark-medical-fill" data-bs-target="#modalInfos" data-bs-toggle="modal"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Informações!"
                                       onclick="infos('<?php echo $ativo['idAtivo'] ?>')"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="busca_prod_ml.php">
                <button type="button" class="btn btn-primary" style="margin-top: 30px; text-decoration: none;">Reposição</button>
            </a>

            <input type="hidden" id="idAtivo" value="">
        </div>

        <?php 
        include_once('modal_infos.php');
        include_once('modal_ativos.php');
        include_once('modal_imagens.php');
        
        ?>
    </div>
    <?php 
    include_once('contrape.php');
    ?>
</body>
</html>
