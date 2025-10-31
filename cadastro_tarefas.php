<?php
session_start();
require_once 'bd.php';
if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {
    header("Location: index.php");
exit; 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$descricao =trim($_POST['descricao_tarefa'] ?? '');
$setor = trim($_POST['nome_setor'] ?? '');
$prioridade = trim($_POST['prioridade_tarefa'] ?? '');

if($descricao === '' || $setor === ''|| $prioridade === ''){
    echo 'Preencha todos os campos obrigatórios.';
    exit;
}
    $stmt=$conn->prepare('INSERT INTO Tarefas ("descricao_tarefa, nome_setor, prioridade_tarefa, nome_usuario") VALUES (?,?,?,?)');
if ($stmt){
    $stmt->bind_param('ssss', $descricao, $setor, $prioridade, $_SESSION['nome_usuario']);
    if ($stmt->execute()){
        echo 'Tarefa cadastrada.';
    }else{
        echo 'Erro ao cadastrar';
    }
    $stmt->close();
}else{
    echo 'Erro ao consultar BD';
}
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
</head>

<body>
    <h3>Bom dia, <?php echo $_SESSION["nome_usuario"]; ?></h3>
    <a href="sair.php">
        <input type="button" value="sair" event="sair.php">
    </a>
    <br><br>
    <h2>Cadastrar Tarefas</h2>
        <br><br>
    <form action=" cadastro_tarefas.php" method="POST" onsubmit="return confirm ('Deseja realmente cadastrar?')">
        <label for> 'Descrição:'></label>
        <input type="text"  id=descricao_tarefa name="descricao_tarefa" required>

         <label for> 'Setor:'></label>
        <input type="text"  id="nome_setor" name="nome_setor" required>

        <label for> 'Usuário:'></label>
        <?php echo $_SESSION["nome_usuario"]; ?>

          <label for> 'Prioridade:'></label>
        <select  id="prioridade_tarefa" name="prioridade_tarefa" required>
            <option value = "Baixa">Baixa</option>
            <option value = "Média">Média</option>
            <option value = "Alta">Alta</option>
</select>
<input type = "submit" value= "Cadastrar">
 </form>

</body>

</html>