<?php
session_start();
if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atividades</title>
</head>

<body>
    <h3>Bom dia, <?php echo $_SESSION["nome_usuario"]; ?></h3>
    <a href="sair.php">
        <input type="button" value="sair" event="sair.php>
    </a>
    <br><br>
    <h2>Cadastrar Tarefas</h2>
        <br><br>
    <form action=" inserir+atividade.php" method=POST onsubmit="return confirm ('Deseja realmente sair?')">
        <label for "Descrição:"></label>
        <input type="text" name="Inserir">
        </form>

</body>

</html>