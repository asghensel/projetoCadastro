<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');
 include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');
$title="Busca produto Mercado Livre";
include_once('menu.php');




$sql="
SELECT
 quantidadeAtivo,
 quantidadeMinima,
 descricaoAtivo,
 (select quantidadeUso from movimentacao m WHERE m.idAtivo = a.idAtivo and m.statusMov='S') as quantidade_uso,
 (select descricaoMarca from marca ma WHERE ma.idMarca = a.idMarca) as descr_marca
 FROM ativo a
 ";


$result= mysqli_query($conexao, $sql) or die(false);
$movimentacoes = $result->fetch_all(MYSQLI_ASSOC);

foreach ($movimentacoes as $movimentacao){
  $quantidade_disponivel = $movimentacao['quantidadeAtivo']- $movimentacao['quantidade_uso'];
    
    if ($quantidade_disponivel < $movimentacao['quantidadeMinima']){
 $termo_busca = $movimentacao['descricaoAtivo'].$movimentacao['descr_marca'];
            $resultado .= busca_prod_ml($termo_busca);
    }
   
}

?>
<link rel="stylesheet" href="../css/mercadoLivre.css">

<div class="container">
    <?php echo $resultado; ?>
</div>