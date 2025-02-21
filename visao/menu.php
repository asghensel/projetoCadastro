<?php

include_once('../controle/controle_session.php');
include_once('cabecalho.php');
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Submenu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/menu.js"></script>
</head>

<body>
    <nav>
        <ul>
            <div class="navbar">
                <li><img src="../midia/senac_logo_branco.png"></li>
                <li><a href="telaInicial.php">
                        <div class="navbar-item" data-menu="menu1">Início</div>
                    </a></li>
                <li>
                    <div class="navbar-item" data-menu="menu2">
                        Usuarios
                        <div class="submenu">
                            <a href="../visao/cadastrarusuario.php">Cadastrar</a>
                            <a href="../visao/listar_usuario.php">Listagem</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="navbar-item" data-menu="menu3">
                        Cadastrar
                        <div class="submenu">
                            <a href="../visao/ativos.php">Ativos</a>
                            <a href="../visao/marcas.php">Marcas</a>
                            <a href="../visao/tipos.php">Tipos</a>
                        </div>

                    </div>
                </li>
                <li>
                    <div class="navbar-item" data-menu="menu4">
                        Atividade
                        <div class="submenu">
                            <a href="../visao/movimentacao_ativo.php">Movimentações</a>
                            <a href="../visao/relatorios.php">Relatórios</a>
                        </div>

                    </div>
                </li>
                <li id="logout">
                    <div class="navbar-item">
                        <a class="logout-link" onclick="logoutUser()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </div>
        </ul>
    </nav>
</body>

</html>