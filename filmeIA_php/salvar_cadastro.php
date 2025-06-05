<?php
include 'conexao.php';
session_start(); // Inicia a sessão

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se todos os campos foram preenchidos
if ($nome && $email && $senha) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Caminho da imagem padrão
    $imagem_padrao = 'imagemPadrao/25d257fe-8ef9-45bf-b8bb-ee6d8e6de15f.png';

    // Prepara a query com a imagem
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $senhaHash, $imagem_padrao);

    if ($stmt->execute()) {
        // Recupera o ID do novo usuário
        $usuario_id = $conn->insert_id;

        // Inicia a sessão com os dados do usuário
        $_SESSION['usuario_id'] = $usuario_id;
        $_SESSION['usuario_nome'] = $nome;

        // Redireciona para o painel
        header('Location: painel.php');
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos.";
}

$conn->close();
?>
