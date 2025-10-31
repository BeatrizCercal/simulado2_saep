<?php
require "bd.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome_usuario"] ?? "");
    $email = trim($_POST["email_usuario"] ?? "");

    $stmt = $conexao->prepare("SELECT pk, nome_usuario, email_usuario FROM tabela WHERE email_usuario = ? AND senha_usuario = ?");
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();
        $_SESSION["nome_usuario"] = $dados["nome_usuario"];
        $_SESSION["idUsuário"] = $dados["Usuário_idUsuário"];
        $_SESSION["conectado"] == true;

        header ("Location: pagina_inicial.php");
        exit;
    }
}
?>
