<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conexao.php');
$title="Marcas";
include('menu.php');
include_once('cabecalho.php');
$sql = "
SELECT 
    idMarca,  
    descricaoMarca, 
    statusMarca,  
    dataCadastroMarca,   
    (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) AS usuario
FROM 
    marca a";


$result = mysqli_query($conexao, $sql) or die(false);
$marcas = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/marcas.css">
    <script src="../js/marcas.js"></script>
    <title>Cadastro_Marcas</title>
</head>

<body>
    <div class="container">
        <div class="d-flex">
            <button type="button" class="btn btn-primary cadastrar" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="modal"> Cadastrar Marca</button>
        </div>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data Cadastro</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach($marcas as $marca){
        ?>
                    <tr>
                        <td>

                            <?php echo $marca['idMarca']; ?>

                        </td>
                        <td>

                            <?php echo $marca['descricaoMarca']; ?>

                        </td>
                        <td><?php 
    $dataCadastro = $marca['dataCadastroMarca'];
    echo date('d/m/Y H:i:s', strtotime($dataCadastro)); 
    ?></td>
                        <td><?php echo $marca['usuario']; ?></td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-between;">
                                <div class="muda_status">
                                    <?php
            if($marca['statusMarca']=="S"){
              ?>
                                    <div class="inativo" onclick="muda_status('N', '<?php echo $marca['idMarca'] ?>')">
                                        <i class="bi bi-toggle-on"></i>
                                    </div>
                                    <?php      
            }else{
               ?>
                                    <div class="ativo" onclick="muda_status('S', '<?php echo $marca['idMarca'] ?>')">
                                        <i class="bi bi-toggle-off"></i>
                                    </div>
                                    <?php
            }
          ?>
                                </div>

                                <div class="edit">
                                    <i class="bi bi-pencil-square"
                                        onclick="editar('<?php echo $marca['idMarca'] ?>')"></i>
                                </div>

                                <div class="trash">
                                    <i class="bi bi-trash" onclick="deletar('<?php echo $marca['idMarca'] ?>')"></i>
                                </div>

                        </td>
                    </tr>
                    <?php
}
?>
        </div>

        </tbody>
        </table>
        <input type="hidden" id="idMarca" value="">
        <?php
        include_once('modal_marcas.php');
        ?>
    </div>

</body>

</html>