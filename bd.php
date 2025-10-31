<?php
$banco = 'simulado2';
$servidor = 'localhost';
$usuario = 'root';
$senha = 'root';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Erro ao conectar" . $conexao->connect_error);
}
?>