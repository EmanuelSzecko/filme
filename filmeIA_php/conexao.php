<?php
// conexao.php
$servidor = "localhost";
$usuario = "root";
$senha = ""; // se você estiver usando XAMPP, WAMP ou Laragon, normalmente está vazio
$banco = "iafilmes";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
