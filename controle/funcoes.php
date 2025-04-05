<?php
function busca_info_bd($conexao, $tabela, $coluna_where = false, $valor_where = false)
{
    $sql = " select * from " . $tabela;

    if ($coluna_where != false) {
        $sql .= " where $coluna_where = '" . $valor_where . "' ";

    }
    $result = mysqli_query($conexao, $sql) or die(false);
    $dados = $result->fetch_all(MYSQLI_ASSOC);
    return $dados;

}

function busca_prod_ml($pesquisa)
{



    $ch = curl_init();
    $pesq = urlencode($pesquisa);
    $url = 'https://api.mercadolibre.com/sites/MLB/search?q=' . $pesq . '&condition=new&status=active&sort=best_seller&limit=20';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization:Bearer APP_USR-5176664781153841-031118-d130da0190774f7d13a23a75f18c867c-455111381",
        "Accept:application/json,"
    ]);


    $output = curl_exec($ch);
    curl_close($ch);
    $dados = json_decode($output, true);
    $conteudo = '';
    if (isset($dados['results']) && count($dados['results']) > 0) {
        foreach ($dados['results'] as $produto) {
            $conteudo .= "<div class='produto'>";
            $conteudo .= "<h3>" . htmlspecialchars($produto['title']) . "</h3>";
            $conteudo .= "<img src='" . htmlspecialchars($produto['thumbnail']) . "' alt='Imagem do Produto'>";
            $conteudo .= "<p>Preço: R$" . number_format($produto['price'], 2, ',', '.') . "</p>";
            $conteudo .= "<a href='" . htmlspecialchars($produto['permalink']) . "' target='_blank'>Ver no Mercado Livre</a>";
            $conteudo .= "</div>";
        }
    }

    return $conteudo;
}

?>