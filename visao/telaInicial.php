<?php
include_once('cabecalho.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio.css">
    <title>Página Inicial</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <li><img src="../midia/senac_logo_branco.png"></li>
                <div  id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item" id="logout">
                            <a class="logout-link" href="login_usuario.php">
                                <i class="fas fa-sign-out-alt"></i> Entrar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo principal -->
        <div class="container">
                <div class="cabecalho">
        <h1>Bem-vindo à Página Inicial</h1>
        </div>
            <div class="grid">


                <div class="box">

                    <h3 style="font-size: 2em;">SOBRE O PROJETO</h3>

                    <p>A turma 13 do curso de TI do Senac Santa Cruz, foi desafiada à participar de um projeto onde se
                        consistia em cadastrar todos os ativos da sala, ou seja, criar um patrimônio dos recursos da
                        sala 205(ferramentas, hardwares, periféricos, etc). O projeto consistia em nós recuperarmos os
                        ativos que foram atingidos pela enchente, onde tivemos que desmontá-los, limpá-los e testarmos
                        cada um deles para ver quais ainda funcionavam e quais devíamos mandar para descarte, os que
                        funcionavam nós identificamos, e após isso separá-los em caixas e alocalos em locais
                        identificados,
                        cadastrando tudo em um protótipo de site feito pelo professor Rafael Frantz . O processo foi
                        longo
                        e
                        batalhador, ficamos no periódo de 17 de julho até 23 de agosto trabalhando no projeto, mas no
                        final
                        entregamos
                        a sala totalmente arrumada, e identificada, com o patrimônio todo registrado. Entretanto, no
                        meio
                        do
                        processo tivemos muitos problemas com o registro dos ativos por conta do site provisório que
                        estávamos
                        utilizando, então aí nos veio a ideia de criar um site que facilitaria isso, com o professor
                        Ivan
                        Kloh, desenvolvemos um sistema que faria o cadastro de todos os ativos do Senac, que concerteza,
                        é
                        de fácil
                        uso e muito eficiente para o processo de registro do patrimônio
                    </p>



                    <div class="carrossel">
                        <div class="carroca" id="img">
                            <img src="../midia/fotoTurma.jpeg" class="imagens">
                            <img src="../midia/fotoPizza.jpeg" class="imagens">
                        </div>
                    </div>

                </div>
                <div class="box2">

                    <br><br>
                    <h2><b>USUÁRIO</b></h2>
                    <p><b>CADASTRE SEU USUÁRIO ABAIXO, CASO JÁ TENHA UM, FAÇA O LOGIN DELE</b></p>
                    <hr>
                    <div class="columns">
                        <div class="margin">
                            <div class="icon" id="cadastro">
                                <a href="cadastrarusuario.php">
                                    <i class="fa fa-address-card"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>Cadastro</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA FAZER SEU CADASTRO
                            </p>
                        </div>

                        <div class="margin">
                            <div class="icon" id="login">
                                <a href="login_usuario.php">
                                    <i class="fa fa-user"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>Login</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA FAZER SEU LOGIN
                            </p>
                        </div>
                    </div>
                    <br><br>
                    <h2><b>PATRIMÔNIO</b></h2>
                    <p><b>ABAIXO, COMECE A FAZER CADASTROS E MOVIMENTAR OS ATIVOS </b></p>
                    <hr>


                    <div class="columns">
                        <div class="margin">
                            <div class="icon" id="relatorios">
                                <a href="relatorios.php">
                                    <i class="fa fa-line-chart"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>RELATÓRIOS</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA GERAR UM RELATÓRIO
                            </p>
                        </div>

                        <div class="margin">
                            <div class="icon" id="listagem">
                                <a href="listar_usuario.php">
                                    <i class="fa fa-users"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>LISTAGEM</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA VER A LISTA DE USERS
                            </p>
                        </div>

                        <div class="margin">
                            <div class="icon" id="ativos">
                                <a href="ativos.php">
                                    <i class="fa fa-desktop"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>ATIVOS</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA CADASTRAR UM ATIVO
                            </p>
                        </div>

                        <div class="margin">
                            <div class="icon" id="movimentacao">
                                <a href="movimentacao_ativo.php">
                                    <i class="fa fa-window-restore"></i>
                                </a>
                            </div>
                            <span>
                                <h3 style="text-transform: uppercase;"><b>MOVIMENTAÇÃO</b></h3>
                            </span>
                            <p>
                                CLIQUE ACIMA PARA CADASTRAR UMA MOVIMENTAÇÃO
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>




        <?php
        include('contrape.php');
        ?>
    </body>
    <script>
        const imgs = document.getElementById("img");
        const img = document.querySelectorAll("#img img");

        let idx = 0;

        function carrossel() {
            idx++;

            if (idx > img.length - 1) {
                idx = 0;
            }

            imgs.style.transform = `translateX(${-idx * 600}px)`;
        }
        setInterval(carrossel, 3000);
    </script>

    </html>