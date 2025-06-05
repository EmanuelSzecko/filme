<?php
// Arquivo login.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Entrar - IA Filmes</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px #000;
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #ff5050;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e63946;
        }
        a {
            color: #ff5050;
            text-decoration: none;
            display: block;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Entrar no IA Filmes</h2>
        <form action="verificar_login.php" method="post">
            <input type="email" name="email" placeholder="Seu e-mail" required>
            <input type="password" name="senha" placeholder="Sua senha" required>
            <input type="submit" value="Entrar">
        </form>
        
        <a href="index.php">← Voltar para a página inicial</a>
    </div>

</body>
</html>
