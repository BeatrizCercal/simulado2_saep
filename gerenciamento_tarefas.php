<?php
session_start();
if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {
    header("Location: gerenciamento_tarefas.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>
<body>
    <h2>Tela Inicial</h2>
    <h3>Seja Bem-Vindo, <?php echo $_SESSION["nome_usuario"]; ?></h3>
    <a href=cadastro_tarefas.php>
        <input type=button value="Cadastrar Tarefas">
</a>


</body>
</html>