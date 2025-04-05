<?php 

include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$usuario_altera = $_GET['idUsuario'];


$sql = "
SELECT 
    idUsuario,  
    nomeUsuario, 
    nicknameUsuario,  
    turmaCadastro,
    idCargo,
    (SELECT descricaoCargo FROM cargos u WHERE u.idCargo = a.idCargo) AS cargo
FROM 
    usuario a
    WHERE
    idUsuario = $usuario_altera";

$Cargos = busca_info_bd($conexao, 'cargos');
$result = mysqli_query($conexao, $sql) or die(false);
$users = $result->fetch_all(MYSQLI_ASSOC);



foreach($users as $user){
    $nome = $user['nomeUsuario']; 
    $turma = $user['turmaCadastro']; 
    $id_user = $user['idUsuario'];
    $cargo = $user['cargo'];
    $idCargo = $user['idCargo'];
}
include_once('cabecalho.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alterarUsuario.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Alterar</title>
</head>

<body>

</body>

</html>

<body>
    <div class="container">
        <form action="../controle/alterar_usuario_controle.php" method="post" id="formulario">
            <input type="hidden" value="<?php echo $id_user ?>" name="id">
            <div class="box">
                <h1 id="title">Alteração Usuário</h1>
                <div class="mb-2">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" placeholder="Altere seu nome aqui" name="nome"
                        required value="<?php echo $nome ?>">
                </div>
                <div class="mb-2">
                    <label for="turma" class="form-label">Turma do Usuário</label>
                    <input type="text" class="form-control" id="turma" placeholder="Altere sua turma aqui" name="turma"
                        required value="<?php echo $turma ?>">
                </div>
                <div class="mb-2">
                    <label for="turma" class="form-label">Cargo do Usuário</label>
                   
                        <select class="form-select" id="cargo" name="cargo" value="<?php echo $cargo ?>">
                            
                            <?php 
                        foreach($Cargos as $Cargo){
                            echo '<option value="'.$Cargo['idCargo'].'">'.$Cargo['descricaoCargo'].'</option>';
                        }
                                
                            
                            ?>
                        </select>
                </div>


                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>


    </div>
  
</body>

</html>