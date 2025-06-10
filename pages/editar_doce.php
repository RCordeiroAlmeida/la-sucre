<?php 
session_start(); // Adicionado para gerenciar mensagens de sessão
include '../includes/conn.php';
include '../includes/menu.php';

// Verifica se o ID foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['mensagem'] = "ID inválido.";
    $_SESSION['tipo_mensagem'] = "danger";
    header('Location: cardapio.php');
    exit();
}

$id = (int)$_GET['id']; // Força conversão para inteiro

// Busca os dados do doce
$sql = "SELECT * FROM doces WHERE doce_cod = ?"; 
$stmt = $conn->prepare($sql);
if (!$stmt) {
    $_SESSION['mensagem'] = "Erro na preparação da consulta: " . $conn->error;
    $_SESSION['tipo_mensagem'] = "danger";
    header('Location: cardapio.php');
    exit();
}

$stmt->bind_param("i", $id);
if (!$stmt->execute()) {
    $_SESSION['mensagem'] = "Erro ao buscar o doce: " . $stmt->error;
    $_SESSION['tipo_mensagem'] = "danger";
    header('Location: cardapio.php');
    exit();
}

$resultado = $stmt->get_result();
$doce = $resultado->fetch_assoc();

if (!$doce) {
    $_SESSION['mensagem'] = "Doce não encontrado.";
    $_SESSION['tipo_mensagem'] = "danger";
    header('Location: cardapio.php');
    exit();
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    
    // Validações básicas
    if (empty($nome) || empty($descricao)) {
        $_SESSION['mensagem'] = "Nome e descrição são obrigatórios.";
        $_SESSION['tipo_mensagem'] = "danger";
    } else {
        // Tratamento da imagem (se uma nova foi enviada)
        if (isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0) {
            $diretorio = "../uploads/";
            
            // Verifica se o diretório existe
            if (!file_exists($diretorio)) {
                mkdir($diretorio, 0755, true);
            }
            
            // Valida o tipo de arquivo
            $permitidos = ['image/jpeg', 'image/png', 'image/gif'];
            $tipo = mime_content_type($_FILES['imagem']['tmp_name']);
            
            if (!in_array($tipo, $permitidos)) {
                $_SESSION['mensagem'] = "Tipo de arquivo não permitido. Use apenas JPEG, PNG ou GIF.";
                $_SESSION['tipo_mensagem'] = "danger";
                header('Location: editar_doce.php?id='.$id);
                exit();
            }
            
            $nome_arquivo = uniqid() . '_' . basename($_FILES['imagem']['name']);
            $caminho_completo = $diretorio . $nome_arquivo;
            
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
                // Remove a imagem antiga se existir
                if (!empty($doce['doce_url_img']) && file_exists("../" . $doce['doce_url_img'])) {
                    unlink("../" . $doce['doce_url_img']);
                }
                $url_imagem = "uploads/" . $nome_arquivo;
            } else {
                $_SESSION['mensagem'] = "Erro ao fazer upload da imagem.";
                $_SESSION['tipo_mensagem'] = "danger";
                header('Location: editar_doce.php?id='.$id);
                exit();
            }
        } else {
            $url_imagem = $doce['doce_url_img'];
        }
        
        // Atualiza no banco de dados
        $sql_update = "UPDATE doces SET doce_nome = ?, doce_descricao = ?, doce_url_img = ? WHERE doce_cod = ?";
        $stmt_update = $conn->prepare($sql_update);
        
        if (!$stmt_update) {
            $_SESSION['mensagem'] = "Erro na preparação da atualização: " . $conn->error;
            $_SESSION['tipo_mensagem'] = "danger";
        } else {
            $stmt_update->bind_param("sssi", $nome, $descricao, $url_imagem, $id);
            
            if ($stmt_update->execute()) {
                $_SESSION['mensagem'] = "Doce atualizado com sucesso!";
                $_SESSION['tipo_mensagem'] = "success";
                header('Location: cardapio.php');
                exit();
            } else {
                $_SESSION['mensagem'] = "Erro ao atualizar o doce: " . $stmt_update->error;
                $_SESSION['tipo_mensagem'] = "danger";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Doce - La Sucré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff8f0;
            padding-top: 80px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .form-title {
            color: #412C01;
            margin-bottom: 30px;
            text-align: center;
        }
        .preview-imagem {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 15px;
            border-radius: 10px;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="form-title">Editar Doce</h2>
            
            <?php if (isset($_SESSION['mensagem'])): ?>
                <div class="alert alert-<?php echo $_SESSION['tipo_mensagem']; ?>">
                    <?php echo $_SESSION['mensagem']; ?>
                </div>
                <?php 
                unset($_SESSION['mensagem']);
                unset($_SESSION['tipo_mensagem']);
                ?>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Doce</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($doce['doce_nome']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo htmlspecialchars($doce['doce_descricao']); ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem do Doce</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" accept="image/jpeg, image/png, image/gif">
                    <small class="text-muted">Deixe em branco para manter a imagem atual. Formatos aceitos: JPG, PNG, GIF</small>
                    <?php if (!empty($doce['doce_url_img'])): ?>
                        <div class="mt-2">
                            <p>Imagem atual:</p>
                            <img src="../<?php echo htmlspecialchars($doce['doce_url_img']); ?>" class="preview-imagem" alt="Imagem atual">
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="cardapio.php" class="btn btn-secondary me-md-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>