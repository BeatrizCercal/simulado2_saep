<?php
$nome = 'simulado2';
$servidor = 'localhost';
$usuario = 'root';
$senha = 'root';

$conexao = new mysqli($nome, $servidor, $usuario, $senha);
if ($conexao->connect_error) {
    die("Erro ao conectar" . $conexao->connect_error);
}
?>