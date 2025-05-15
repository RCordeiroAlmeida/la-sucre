<?php
include '../includes/conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        // Limpar o nome para evitar problemas com acentos/espaços/caracteres especiais
        $nomeLimpo = preg_replace('/[^a-zA-Z0-9_-]/', '_', strtolower($nome));
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        $nomeImagem = $nomeLimpo . '.' . $extensao;
        $caminhoImagem = '../assets/img/doces/' . $nomeImagem;
        $urlImagem = 'assets/img/doces/' . $nomeImagem;

        // Salva o arquivo no servidor
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoImagem);

        // Salva no banco
        $stmt = $conn->prepare("INSERT INTO doces (doce_nome, doce_descricao, doce_url_img) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $descricao, $urlImagem);

        if ($stmt->execute()) {
            header("Location: cardapio.php?sucesso=1");
            exit;
        } else {
            echo "Erro ao salvar no banco: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}

$conn->close();

?>
