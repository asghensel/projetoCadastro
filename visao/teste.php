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
    (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS descricaoNivel
FROM 
    opcoes_menu a
WHERE nivelOpcao = 1";

$result = mysqli_query($conexao, $sql) or die("Erro na consulta SQL");
$opcoes = $result->fetch_all(MYSQLI_ASSOC);

// Debug para verificar se a consulta retornou os dados corretamente
var_dump($opcoes);

$menuOpcoes = [];
foreach ($opcoes as $row) {
    $menuOpcoes[$row['idOpcao']] = [
        'DESCR_OPCAO' => $row['descricaoOpcao'] ?? '',
        'NIVEL_OPCAO' => $row['nivelOpcao'] ?? null,  // Evita erro de array key
        'URL_OPCAO' => $row['urlOpcao'] ?? '',
        'STATUS_OPCAO' => $row['statusOpcao'] ?? '',
        'DESCR_NIVEL' => $row['descricaoNivel'] ?? '',
        'sub' => []
    ];

    $sqlSub = "
    SELECT 
        idOpcao,  
        descricaoOpcao, 
        urlOpcao,
        nivelOpcao,
        statusOpcao,  
        dataCadastroOpcao,   
        (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS descricaoNivel
    FROM 
        opcoes_menu a
    WHERE idSuperior = " . (int)$row['idOpcao'];  // Cast para evitar SQL Injection

    $resultSub = mysqli_query($conexao, $sqlSub) or die("Erro na consulta de subopções");
    $subOpcoes = $resultSub->fetch_all(MYSQLI_ASSOC);

    foreach ($subOpcoes as $sub) {
        $menuOpcoes[$row['idOpcao']]['sub'][$sub['idOpcao']] = [
            'DESCR_OPCAO' => $sub['descricaoOpcao'] ?? '',
            'NIVEL_OPCAO' => $sub['nivelOpcao'] ?? null,
            'URL_OPCAO' => $sub['urlOpcao'] ?? '',
            'STATUS_OPCAO' => $sub['statusOpcao'] ?? '',
            'DESCR_NIVEL' => $sub['descricaoNivel'] ?? '',
            'sub' => []
        ];
    }
}


function gerarHTML($menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo '<li><span class="caret">' . htmlspecialchars($item['DESCR_OPCAO']) . '</span>';
        if (!empty($item['sub'])) {
            echo '<ul class="nested">';
            foreach ($item['sub'] as $subitem) {
                echo '<li><span class="caret">' . htmlspecialchars($subitem['DESCR_OPCAO']) . '</span>';
                if (!empty($subitem['sub'])) {
                    echo '<ul class="nested">';
                    foreach ($subitem['sub'] as $acao) {
                        echo '<li><a href="' . htmlspecialchars($acao['URL_OPCAO']) . '">' . htmlspecialchars($acao['DESCR_OPCAO']) . '</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    echo "</ul>";
}

gerarHTML($menuOpcoes);
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                var nested = this.parentElement.querySelector(".nested");
                if (nested) {
                    nested.classList.toggle("active");
                    this.classList.toggle("caret-down");
                }
            });
        }
    });
</script>

<style>
    ul {
        list-style-type: none;
    }
    .caret {
        cursor: pointer;
        user-select: none;
    }
    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }
    .caret-down::before {
        transform: rotate(90deg);
    }
    .nested {
        display: none;
    }
    .active {
        display: block;
    }
</style>

</body>
</html>
