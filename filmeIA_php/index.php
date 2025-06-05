<?php
// Aqui poderíamos futuramente puxar os filmes de um banco, mas por agora será fixo
$filmes = [
    ['titulo' => 'Vingadores', 'imagem' => 'imagens/vingadores.jpg'],
    ['titulo' => 'Titanic', 'imagem' => 'imagens/titanic.jpg'],
    ['titulo' => 'Barbie', 'imagem' => 'imagens/barbie.jpg'],
    ['titulo' => 'Jogos Vorazes', 'imagem' => 'imagens/jogosvorazes.jpg'],
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IA Filmes</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
        }
        header {
            background-color: #1a1a1a;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff5050;
        }
        .botoes a {
            background-color: #ff5050;
            color: white;
            padding: 10px 15px;
            margin-left: 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .botoes a:hover {
            background-color: #e63946;
        }
        main {
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .grade-filmes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .filme {
            width: 180px;
            text-align: center;
        }
        .filme img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">IA Filmes</div>
        <div class="botoes">
            <a href="login.php">Entrar</a>
            <a href="cadastrar.php">Cadastrar</a>
        </div>
    </header>

    <main>
        <h1>Filmes em Destaque</h1>
        <div class="grade-filmes">
            <?php foreach ($filmes as $filme): ?>
                <div class="filme">
                    <img src="<?php echo $filme['imagem']; ?>" alt="<?php echo $filme['titulo']; ?>">
                    <p><?php echo $filme['titulo']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>
