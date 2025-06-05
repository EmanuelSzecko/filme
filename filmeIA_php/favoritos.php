<?php
session_start();

if (!isset($_SESSION['usuario_nome'])) {
    header("Location: login.php");
    exit;
}

$nome = $_SESSION['usuario_nome'];
$foto_padrao = 'default-profile.png';
$foto = (isset($_SESSION['usuario_foto']) && $_SESSION['usuario_foto'] !== '') ? $_SESSION['usuario_foto'] : $foto_padrao;

$filmes_curtidos = [
    "Filme 1",
    "Filme 2",
    "Filme 3",
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IA Filmes - Favoritos</title>
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

        .titulo {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .lista-filmes {
            list-style: none;
            padding: 0;
            max-width: 400px;
            margin: 0 auto;
        }

        .lista-filmes li {
            background-color: #222;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .btn-voltar {
            background-color: #ff5050;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            display: block;
            max-width: 120px;
            margin-left: auto;
            margin-right: auto;
            transition: background-color 0.3s ease;
        }

        .btn-voltar:hover {
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

        function voltarPainel() {
            window.location.href = 'painel.php';
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
    <button onclick="voltarPainel()">Voltar para o Painel</button>
</nav>

<main>
    <h1 class="titulo">Seus Filmes Curtidos</h1>
    <ul class="lista-filmes">
        <?php foreach ($filmes_curtidos as $filme) : ?>
            <li><?= htmlspecialchars($filme) ?></li>
        <?php endforeach; ?>
    </ul>
</main>

<footer>
    © 2025 IA Filmes. Todos os direitos reservados.
</footer>

</body>
</html>
