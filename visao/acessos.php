<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include('menu.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');

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
WHERE statusOpcao = 'S' AND nivelOpcao = 1 "

;

$result = mysqli_query($conexao, $sql) or die(false);
$opcoes = $result->fetch_all(MYSQLI_ASSOC);
$niveis = busca_info_bd($conexao, 'nivel_acesso');
$cargos = busca_info_bd($conexao, 'cargos');


$novoArr = [];
foreach ($opcoes as $row) {
    $novoArr[$row['idOpcao']]['DESCR_OPCAO'] = $row['descricaoOpcao'];
    $novoArr[$row['idOpcao']]['NIVEL_OPCAO'] = $row['nivelOpcao'];
    $novoArr[$row['idOpcao']]['URL_OPCAO'] = $row['urlOpcao'];
    $novoArr[$row['idOpcao']]['STATUS_OPCAO'] = $row['statusOpcao'];
    $novoArr[$row['idOpcao']]['DESCR_NIVEL'] = $row['nivel'];



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
                        WHERE statusOpcao = 'S' AND idSuperior = " . $row['idOpcao'];
    ;

    $resultSub = mysqli_query($conexao, $sqlSub) or die(false);
    $opcoesSub = $resultSub->fetch_all(MYSQLI_ASSOC);

    foreach ($opcoesSub as $sub) {
        $novoArr[$sub['idOpcao']]['DESCR_OPCAO'] = $sub['descricaoOpcao'];
        $novoArr[$sub['idOpcao']]['NIVEL_OPCAO'] = $sub['nivelOpcao'];
        $novoArr[$sub['idOpcao']]['URL_OPCAO'] = $sub['urlOpcao'];
        $novoArr[$sub['idOpcao']]['STATUS_OPCAO'] = $sub['statusOpcao'];
        $novoArr[$sub['idOpcao']]['DESCR_NIVEL'] = $sub['nivel'];



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
                        WHERE statusOpcao = 'S' AND idSuperior = " . $sub['idOpcao'];
        ;

        $resultAcoes = mysqli_query($conexao, $sqlAcoes) or die(false);
        $opcoesAcoes = $resultAcoes->fetch_all(MYSQLI_ASSOC);

        foreach ($opcoesAcoes as $acoes) {
            $novoArr[$acoes['idOpcao']]['DESCR_OPCAO'] = $acoes['descricaoOpcao'];
            $novoArr[$acoes['idOpcao']]['NIVEL_OPCAO'] = $acoes['nivelOpcao'];
            $novoArr[$acoes['idOpcao']]['URL_OPCAO'] = $acoes['urlOpcao'];
            $novoArr[$acoes['idOpcao']]['STATUS_OPCAO'] = $acoes['statusOpcao'];
            $novoArr[$acoes['idOpcao']]['DESCR_NIVEL'] = $acoes['nivel'];


        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/acesso.js"></script>
    <link rel="stylesheet" href="../css/acesso.css">
    <title>Acessos</title>
</head>

<body>
    <div class="container">
    <div class="cabecalho">
                <label for="turma" class="form-label titulo"><h1>Acesso Usuário</h1></label>
                </div>
        <div class="row" style="display: grid !important;">
        
                <select name="cargo" id="cargo" onchange="busca_acesso()" class="form-control">
                    <option value="">Selecione o cargo</option>
                    <?php
                    foreach ($cargos as $value) {
                        echo '<option value="' . $value['idCargo'] . '">' . $value['descricaoCargo'] . '</option>';
                    }
                    ;
                    ?>
                </select>
           
        </div>

        <?php
   
        foreach ($novoArr as $idOpcao => $opcao) {
            
            ?>
            <div class="row">
                <?php
                $nivel = $opcao['NIVEL_OPCAO'];
                $padding = "";
                if ($nivel == 1) {
                    $padding = "padding-left: 0px;";
                } else if ($nivel == 2) {
                    $padding = "padding-left: 15px;";
                } else if ($nivel == 3) {
                    $padding = "padding-left: 30px;";

                }
                ?>
                <div class="linha_opcao" style="<?php echo $padding; ?>"> 


                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 check <?php echo $idOpcao; ?>" type="checkbox" value="<?php echo $idOpcao; ?>"
                                aria-label="Checkbox for following text input">
                        </div>
                        <?php
                        echo $opcao['DESCR_OPCAO'];
                        ?>
                    </div>
                </div>
            </div>
                <?php
        }
        ?>
            
        <button type="button" class="btn btn-primary salvarAcesso">Salvar Acesso</button>
    </div>



    <?php 
    include_once('contrape.php');
    ?>
</body>

</html>