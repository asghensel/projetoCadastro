<?php 
include_once("cabecalho.php");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contrape.css">
    <title>Contrape</title>
    <!-- Importação do Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <main class="main-content">
        <!-- Conteúdo principal da página aqui -->
    </main>

    <footer>
        <div class="footer-container">
            
            <!-- Logo do Senac -->
            <div class="footer-logo">
                <img src="../midia/senac_logo_branco.png" alt="Logo Senac">
            </div>

            <!-- Informações de Contato -->
            <div class="footer-info">
                <p><i class="fas fa-map-marker-alt"></i> <strong>Endereço:</strong> R. Venâncio Aires, 300 - Centro, Santa Cruz do Sul - RS, 96810-204</p>
                <p><i class="fas fa-phone-alt"></i> <strong>Telefone:</strong> (51) 93711-6460</p>
            </div>

            <!-- Redes sociais -->
            <div class="footer-social">
                <a href="https://www.instagram.com/senacsantacruz/" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/555191800354" target="_blank" class="social-icon">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.senacrs.com.br/escola/8ca578ad-a7cc-4d24-b899-135ecc9089a4" target="_blank" class="social-icon">
                    <i class="fas fa-graduation-cap"></i>
                </a>
            </div>
        </div>

        <!-- Direitos Autorais -->
        <p class="footer-copy">&copy; <?php echo date("Y"); ?> - Senac Santa Cruz. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
