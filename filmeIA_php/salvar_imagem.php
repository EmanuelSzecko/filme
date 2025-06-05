<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

if (isset($_FILES['nova_imagem']) && $_FILES['nova_imagem']['error'] === UPLOAD_ERR_OK) {
    $arquivoTmp = $_FILES['nova_imagem']['tmp_name'];
    $nomeOriginal = basename($_FILES['nova_imagem']['name']);
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        header("Location: configuracoes.php?erro=tipo");
        exit;
    }

    $nomeArquivo = uniqid() . "_" . $nomeOriginal;
    $pastaDestino = 'fotos_usuarios/';

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $caminhoCompleto = $pastaDestino . $nomeArquivo;

    if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
        $stmt = $conn->prepare("UPDATE usuarios SET imagem_perfil = ? WHERE id = ?");
        $stmt->bind_param("si", $caminhoCompleto, $usuario_id);
        $stmt->execute();

        $_SESSION['usuario_foto'] = $caminhoCompleto;

        header("Location: configuracoes.php?sucesso=1");
        exit;
    } else {
        header("Location: configuracoes.php?erro=mover");
        exit;
    }
} else {
    header("Location: configuracoes.php?erro=upload");
    exit;
}
?>
