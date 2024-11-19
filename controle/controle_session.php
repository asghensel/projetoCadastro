<?php
session_start();
if($_SESSION['controle_login']== false){
    header('location:../visao/login_usuario.php?erro=acesso_negado');
}


?>