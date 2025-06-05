<?php
include 'conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$query = "SELECT nome, imagem_perfil FROM usuarios WHERE id = $usuario_id";
$resultado = mysqli_query($conn, $query);

if ($linha = mysqli_fetch_assoc($resultado)) {
    $nome = $linha['nome'];
    $imagem = $linha['imagem_perfil'] ?? 'imagemPadrao/25d257fe-8ef9-45bf-b8bb-ee6d8e6de15f.png';
} else {
    echo "Usuário não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Configurações do Perfil</title>
     <style>
    * {
        box-sizing: border-box;
    }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #111;
        color: #fff;
        margin: 0;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
    }
    .container {
        background: #1a1a1a;
        padding: 30px 40px;
        border-radius: 12px;
        max-width: 420px;
        width: 100%;
        box-shadow: 0 0 20px rgba(255, 80, 80, 0.2);
        text-align: center;
    }
    h1, h2 {
        font-weight: 700;
        margin-bottom: 8px;
        color: #ff5050;
    }
    p {
        margin-top: 0;
        font-size: 1rem;
        color: #ccc;
        margin-bottom: 24px;
    }
    .perfil-img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #ff5050;
        box-shadow: 0 4px 12px rgba(255, 80, 80, 0.4);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }
    .perfil-img:hover {
        transform: scale(1.05);
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
    input[type="file"] {
        padding: 10px;
        border-radius: 8px;
        border: 1.5px solid #333;
        width: 100%;
        cursor: pointer;
        background-color: #222;
        color: #fff;
        transition: border-color 0.3s ease;
    }
    input[type="file"]:hover,
    input[type="file"]:focus {
        border-color: #ff5050;
        outline: none;
    }
    button {
        background-color: #ff5050;
        color: white;
        font-weight: 600;
        border: none;
        padding: 12px 30px;
        border-radius: 30px;
        cursor: pointer;
        box-shadow: 0 5px 12px rgba(255, 80, 80, 0.4);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        max-width: 200px;
    }
    button:hover {
        background-color: #e63946;
        box-shadow: 0 7px 20px rgba(230, 57, 70, 0.6);
    }
    .alert {
        margin-top: 20px;
        padding: 12px;
        border-radius: 8px;
        font-weight: bold;
        text-align: center;
    }
    .alert.success {
        background-color: #28a745;
        color: white;
    }
    .alert.error {
        background-color: #dc3545;
        color: white;
    }
    @media (max-width: 480px) {
        .container {
            padding: 20px;
        }
        .perfil-img {
            width: 140px;
            height: 140px;
        }
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Olá, <?= htmlspecialchars($nome) ?>!</h1>
        <p>Essa é sua imagem de perfil atual:</p>
        <img src="<?= $imagem ?>" alt="Imagem de Perfil" class="perfil-img" />

        <h2>Alterar Imagem de Perfil</h2>
        <form action="salvar_imagem.php" method="post" enctype="multipart/form-data">
            <input type="file" name="nova_imagem" accept="image/*" required />
            <button type="submit">Salvar</button>
        </form>
    </div>
    <?php if (isset($_GET['sucesso'])): ?>
    <div class="alert success">Imagem de perfil atualizada com sucesso!</div>
<?php elseif (isset($_GET['erro'])):
    $mensagens = [
        'tipo' => 'Tipo de arquivo inválido. Envie uma imagem JPG, PNG, GIF ou WEBP.',
        'upload' => 'Erro no envio do arquivo. Tente novamente.',
        'mover' => 'Erro ao mover o arquivo. Verifique permissões da pasta.',
    ];
    $erro = $_GET['erro'];
    $mensagem = $mensagens[$erro] ?? 'Erro desconhecido.';
?>
    <div class="alert error"><?= htmlspecialchars($mensagem) ?></div>
<?php endif; ?>
</body>
</html>
