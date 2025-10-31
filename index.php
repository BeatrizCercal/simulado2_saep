<?php
session_start();

$erro = "";
if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'] ?? '';
    unset($_SESSION['erro']);
}

if (isset($_SESSION["nome_usuario"]) && isset($_SESSION['conectado'])) {
    if ($_SESSION["conectado"] == true) {
        header("Location: tela_inicial.php ");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Página de Login de Usuário</h2>

    <form action="login.php" method="POST">
        <label>Nome:</label>
        <input type="nome " name="nome" required>

        <label>Email</label>
        <input type="email" name="email" required>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>