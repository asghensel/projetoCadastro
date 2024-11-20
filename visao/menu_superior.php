<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar com Submenu</title>
    <script src="../js/menu.js"></script>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <nav>
        <ul>
    <div class="navbar">
        <li><div class="navbar-item" data-menu="menu1">
            Início
           
        </div></li>

        <li><div class="navbar-item" data-menu="menu2">
            Usuarios
            <div class="submenu">
                <a href="cadastrarusuario.php">Cadastrar</a>
                <a href="listar_usuario.php">Listagem</a>
            </div>
        </div></li>

        <li><div class="navbar-item" data-menu="menu3">
            Ativos
            </div></li>
        
        <li><div class="navbar-item" data-menu="menu4">
            Movimentação
        </div></li>
    </ul>
</nav>
</body>
</html>
