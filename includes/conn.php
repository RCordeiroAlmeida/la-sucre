<?php
$host = 'localhost';
$usuario = 'root';
$senha = ''; // ou sua senha
$banco = 'lasucre';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>