<?php
include 'conexao.php';

session_start(); // Inicia a sessão antes de qualquer saída

// Verifica se o formulário foi enviado corretamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta segura com prepared statements
    $stmt = mysqli_prepare($conn, "SELECT * FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) === 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];         // <-- ID salvo corretamente
            $_SESSION['usuario_nome'] = $usuario['nome'];     // <-- Nome salvo para exibição
            header("Location: painel.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Requisição inválida.";
}

mysqli_close($conn);
?>
