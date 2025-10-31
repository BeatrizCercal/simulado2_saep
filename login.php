<?php
require "bd.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");

    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE nome_usuario = ? AND email_usuario = ?");
    $stmt->bind_param("ss", $nome, $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc();
        $_SESSION["nome_usuario"] = $dados["nome_usuario"];
        $_SESSION["idUsuário"] = $dados["idUsuário"];
        $_SESSION["conectado"] = true;

        header ("Location: gerenciamento_tarefas.php");
        exit;
    } else {
        $_SESSION['erro'] = 'Não foi possível validar as credenciais de login.';
        header ("Location: index.php");
        exit;
    }
}
?>
