<?php
session_start();

$nome = 'simulado2';
$servidor = 'localhost';
$usuario = 'root';
$senha = '';

$conexao = new MYSQLI($nome, $servidor, $usuario, $senha);
if ($conexao->connect_error) {
    die("Erro ao conectar" . 'connect_error');
}
?>