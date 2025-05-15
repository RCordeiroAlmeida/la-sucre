<?php
// Defina a senha correta
$senha_correta = 'docelasecreta';

// Captura a senha enviada
$senha_digitada = $_POST['senha'] ?? '';

// Verifica
if ($senha_digitada === $senha_correta) {
    // Redireciona para o cadastro de itens
    header("Location: cadastro-itens.php");
    exit;
} else {
    // Volta para o acesso com erro
    echo "<script>alert('Senha incorreta!'); window.location.href = 'acesso.php';</script>";
}
