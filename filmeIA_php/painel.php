<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_nome'])) {
    header("Location: login.php");
    exit;
}

$nome = $_SESSION['usuario_nome'];
$foto_padrao = 'fotos_usuarios/imagemPadrao.png';
$foto = (isset($_SESSION['usuario_foto']) && $_SESSION['usuario_foto'] !== '') ? $_SESSION['usuario_foto'] : $foto_padrao;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IA Filmes - Painel</title>
    <style>
        body {
            margin: 0;
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #1a1a1a;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ff5050;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .perfil {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .perfil img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid #ff5050;
            transition: transform 0.3s ease;
        }

        .perfil:hover img {
            transform: scale(1.1);
        }

        .perfil span {
            font-weight: bold;
        }

        nav {
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            padding: 15px 0;
            gap: 20px;
            border-bottom: 1px solid #333;
        }

        nav button {
            background-color: #ff5050;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        nav button:hover {
            background-color: #e63946;
        }

        main {
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .boas-vindas {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .sugestao {
            margin-top: 10px;
        }

        .sugestao button {
            padding: 10px 15px;
            background-color: #ff5050;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sugestao button:hover {
            background-color: #e63946;
        }

        footer {
            background-color: #1a1a1a;
            color: #999;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 10px;
            }
            header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
            .perfil span {
                display: none;
            }
        }
    </style>
    <script>
        function confirmarLogout() {
            if (confirm('Você deseja realmente sair?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>
</head>
<body>

<header>
    <div class="logo">IA Filmes</div>
    <div class="perfil" onclick="confirmarLogout()" title="Clique para sair">
        <img src="<?= htmlspecialchars($foto) ?>" alt="Foto do usuário">
        <span><?= htmlspecialchars($nome) ?></span>
    </div>
</header>

<nav>
    <button onclick="window.location.href='favoritos.php'">Favoritos</button>
    <button onclick="window.location.href='configuracoes.php'">Configurações</button>
</nav>

<main>
    <div class="boas-vindas">
        <strong>Olá, <?= htmlspecialchars($nome); ?>! 👋</strong>
        <p>Quer ver sugestões de filmes personalizadas?</p>
    </div>

    <div class="sugestao">
        <button onclick="alert('Função de sugestões em breve!')">Quero sugestões!</button>
    </div>
</main>

<footer>
    © 2025 IA Filmes. Todos os direitos reservados.
</footer>

</body>
</html>
