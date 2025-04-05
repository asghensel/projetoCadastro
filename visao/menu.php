<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include_once('../modelo/conexao.php');
$cargo = $_SESSION['idCargo'];

$sqlMenu = "SELECT idOpcao,
                descricaoOpcao, 
                urlOpcao
            FROM
             opcoes_menu O
            WHERE
                nivelOpcao = 1 
                AND statusOpcao ='S' 
                AND idOpcao IN(SELECT idOpcao FROM acesso A WHERE A.idOpcao = O.idOpcao AND statusAcesso = 'S' AND idCargo= $cargo)                                  
                ";
$result = mysqli_query($conexao, $sqlMenu) or die(false);
$acessos_menu = $result->fetch_all(MYSQLI_ASSOC);
$admin = $_SESSION['admin'];
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Submenu</title>
    
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/menu.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <li><img src="../midia/senac_logo_branco.png"></li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <li class="nav-item">
                    <a class="nav-link" href="telainicial.php">Início</a>
                </li>
                <ul class="navbar-nav">
                    <?php foreach ($acessos_menu as $acessos) {

                        $sqlSubMenu = "SELECT idOpcao,
                                    descricaoOpcao,
                                    urlOpcao
                    FROM
                     opcoes_menu O
                    WHERE
                        idSuperior = '" . $acessos['idOpcao'] . "' 
                        AND statusOpcao ='S' AND nivelOpcao = 2
                        AND idOpcao IN(SELECT idOpcao FROM acesso A WHERE A.idOpcao = O.idOpcao AND statusAcesso = 'S' AND idCargo= $cargo)                                  
                        ";
                        $resultSubMenu = mysqli_query($conexao, $sqlSubMenu) or die(false);
                        $acessos_submenu = $resultSubMenu->fetch_all(MYSQLI_ASSOC);
                        if (count($acessos_submenu) > 0) {
                            ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php echo $acessos['descricaoOpcao']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach ($acessos_submenu as $subMenu) {
                                        echo '<li><a class="dropdown-item" href="' . $subMenu['urlOpcao'] . '">' . $subMenu['descricaoOpcao'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        } else {
                            echo '<li class="nav-item">
                                        <a class="nav-link" href="' . $acessos['urlOpcao'] . '">' . $acessos['descricaoOpcao'] . '</a>
                                </li>';
                        }

                    }
                    ?>


            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                
            <?php if ($admin == 'S') {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="opcoes.php">Opção</a></li>
                                <li><a class="dropdown-item" href="cargos.php">Níveis</a></li>
                                <li><a class="dropdown-item" href="acessos.php">Acessos</a></li>
                            </ul>
                        </li>

                    </ul>

                    <?php
                    }
                    ?>

                <li class="nav-item" id="logout">
                    <a class="logout-link nav-link" onclick="logoutUser()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
</body>

</html>