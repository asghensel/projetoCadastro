<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conexao.php');
$title = "opcoes";

include('menu.php');
include_once('cabecalho.php');
$sql = "
SELECT 
    idOpcao,  
    descricaoOpcao, 
    urlOpcao,
    statusOpcao,  
    nivelOpcao,
    dataCadastroOpcao,   
    (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) AS usuario,
    (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS nivel,
    (SELECT idNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS idNivel
FROM 
    opcoes_menu a
WHERE nivelOpcao = 1 "

;

$result = mysqli_query($conexao, $sql) or die(false);
$opcoes = $result->fetch_all(MYSQLI_ASSOC);
$niveis = busca_info_bd($conexao, 'nivel_acesso');


$novoArr =[];
foreach($opcoes as $row){
    $novoArr[$row['idOpcao']]['DESCR_OPCAO']=$row['descricaoOpcao'];
    $novoArr[$row['idOpcao']]['NIVEL_OPCAO']=$row['nivelOpcao'];
    $novoArr[$row['idOpcao']]['URL_OPCAO']=$row['urlOpcao'];
    $novoArr[$row['idOpcao']]['STATUS_OPCAO']=$row['statusOpcao'];
    $novoArr[$row['idOpcao']]['DESCR_NIVEL']=$row['nivel'];
   


    $sqlSub = "
                        SELECT 
                            idOpcao,  
                            descricaoOpcao, 
                            urlOpcao,
                            nivelOpcao,
                            statusOpcao,  
                            dataCadastroOpcao,   
                            (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS nivel
                        FROM 
                            opcoes_menu a
                        WHERE idSuperior = " .$row['idOpcao'];
                        ;

                        $resultSub = mysqli_query($conexao, $sqlSub) or die(false);
                        $opcoesSub = $resultSub->fetch_all(MYSQLI_ASSOC);

    foreach($opcoesSub as $sub){
        $novoArr[$sub['idOpcao']]['DESCR_OPCAO']=$sub['descricaoOpcao'];
        $novoArr[$sub['idOpcao']]['NIVEL_OPCAO']=$sub['nivelOpcao'];
        $novoArr[$sub['idOpcao']]['URL_OPCAO']=$sub['urlOpcao'];
        $novoArr[$sub['idOpcao']]['STATUS_OPCAO']=$sub['statusOpcao'];
        $novoArr[$sub['idOpcao']]['DESCR_NIVEL']=$sub['nivel'];
        


        $sqlAcoes = "
                        SELECT 
                            idOpcao,  
                            descricaoOpcao, 
                            urlOpcao,
                            nivelOpcao,
                            statusOpcao,  
                            dataCadastroOpcao,   
                            (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS nivel
                        FROM 
                            opcoes_menu a
                        WHERE idSuperior = " .$sub['idOpcao'];
                        ;

                        $resultAcoes = mysqli_query($conexao, $sqlAcoes) or die(false);
                        $opcoesAcoes = $resultAcoes->fetch_all(MYSQLI_ASSOC);

    foreach($opcoesAcoes as $acoes){
        $novoArr[$acoes['idOpcao']]['DESCR_OPCAO']=$acoes['descricaoOpcao'];
        $novoArr[$acoes['idOpcao']]['NIVEL_OPCAO']=$acoes['nivelOpcao'];
        $novoArr[$acoes['idOpcao']]['URL_OPCAO']=$acoes['urlOpcao'];
        $novoArr[$acoes['idOpcao']]['STATUS_OPCAO']=$acoes['statusOpcao'];
        $novoArr[$acoes['idOpcao']]['DESCR_NIVEL']=$acoes['nivel'];
        

    }
    }
}


    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/opcoes.css">
    <script src="../js/opcoes.js"></script>
    <title>Cadastro_Opcoes</title>
</head>

<div>
    <div class="container">
        <div class="d-flex">
            <button type="button" class="btn btn-primary cadastrar" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="modal"> Cadastrar Opcao</button>
        </div>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nível</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">URL</th>

                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($novoArr as $chave =>$opcao) {
                    $nivel = $opcao['NIVEL_OPCAO'];
                    $descr_nivel = $opcao['DESCR_NIVEL'];
                    $id = $chave;
                    $descricao = $opcao['DESCR_OPCAO'];
                    $url = $opcao['URL_OPCAO'];
                    $status =$opcao['STATUS_OPCAO'];

                        if ($nivel == 1) {

                        } elseif ($nivel == 2) {

                        } elseif ($nivel== 3) {

                        }

                        ?>
                        <tr>
                            <td <?php if ($nivel == 1) { ?> style="text-align: left;" <?php } elseif ($nivel == 2) { ?> style="text-align: center;" <?php } elseif ($nivel == 3) { ?> style="text-align: right;" <?php } ?>><?php echo $descr_nivel ?></td>
                            <td <?php
                            if ($nivel == 1) { ?> style="padding-left: 10px;" <?php } elseif ($nivel == 2) { ?> style="padding-left: 30px;" <?php } elseif ($nivel == 3) { ?> style="padding-left: 80px;" <?php } ?>>

                                <?php echo $descricao ?>

                            </td>
                            <td><?php echo $url; ?></td>

                            <td>
                                <div class="acoes" style="display: flex; justify-content: space-between;">
                                    <div class="muda_status">
                                        <?php
                                        if ($status== "S") {
                                            ?>
                                            <div class="inativo" onclick="muda_status('N', '<?php echo $id ?>')">
                                                <i class="bi bi-toggle-on"></i>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="ativo" onclick="muda_status('S', '<?php echo $id ?>')">
                                                <i class="bi bi-toggle-off"></i>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="edit">
                                        <i class="bi bi-pencil-square"
                                            onclick="editar('<?php echo $id ?>')"></i>
                                    </div>

                                    <div class="trash">
                                        <i class="bi bi-trash" onclick="deletar('<?php echo $id ?>')"></i>
                                    </div>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
        </div>

        </tbody>
        </table>
        <input type="hidden" id="idOpcao" value="">
        <?php
        include_once('modal_opcoes.php');
        ?>

    </div>

</div>

</body>

</html>