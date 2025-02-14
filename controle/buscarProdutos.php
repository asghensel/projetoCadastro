<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca no Mercado Livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
        }

        button:hover {
            background-color: #0056b3;
        }

        .produto {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #fafafa;
        }

        .produto img {
            max-width: 150px;
            display: block;
            margin-bottom: 10px;
        }

        .produto a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .produto a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Busca de Produtos no Mercado Livre</h1>
        <form method="GET">
            <input type="text" name="busca" placeholder="Digite o nome do produto..." required>
            <button type="submit">Buscar</button>
        </form>

        <?php
        if (isset($_GET['busca'])) {
            $termo = urlencode($_GET['busca']);
            $url = "https://api.mercadolibre.com/sites/MLB/search?q=$termo";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $resultados = json_decode($response, true);

            if (!empty($resultados['results'])) {
                foreach ($resultados['results'] as $produto) {
                    echo "<div class='produto'>";
                    echo "<h3>" . htmlspecialchars($produto['title']) . "</h3>";
                    echo "<img src='" . htmlspecialchars($produto['thumbnail']) . "' alt='Imagem do Produto'>";
                    echo "<p>Preço: R$" . number_format($produto['price'], 2, ',', '.') . "</p>";
                    echo "<a href='" . htmlspecialchars($produto['permalink']) . "' target='_blank'>Ver no Mercado Livre</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
