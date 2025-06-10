<?php 
include '../includes/conn.php';

// Verifica se o ID do doce foi passado na URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $doce_id = intval($_GET['id']);
    
    // Verifica se o formulário foi submetido (confirmação de exclusão)
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Prepara a query para excluir o doce
            $sql = "DELETE FROM doces WHERE doce_cod = ?";
            $stmt = $conn->prepare($sql);
            
            if($stmt) {
                $stmt->bind_param("i", $doce_id);
                $stmt->execute();
                
                if($stmt->affected_rows > 0) {
                    // Redireciona de volta para o cardápio com mensagem de sucesso
                    header("Location: cardapio.php?status=success&msg=Doce excluído com sucesso!");
                    exit();
                } else {
                    throw new Exception("Nenhum registro foi excluído. O doce pode não existir.");
                }
            } else {
                throw new Exception("Erro ao preparar a query: " . $conn->error);
            }
        } catch(Exception $e) {
            // Redireciona de volta para o cardápio com mensagem de erro
            header("Location: cardapio.php?status=error&msg=" . urlencode($e->getMessage()));
            exit();
        } finally {
            if(isset($stmt)) {
                $stmt->close();
            }
            $conn->close();
        }
    }
} else {
    // Se não houver ID, redireciona para o cardápio
    header("Location: cardapio.php?status=error&msg=ID do doce não especificado");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão - La Sucré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff8f0;
            padding-top: 80px;
        }
        .confirmation-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .btn-confirm {
            background-color: #DC3545;
            border: none;
            color: white;
        }
        .btn-confirm:hover {
            background-color: #C82333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="confirmation-container mt-5">
            <h2 class="text-center mb-4">Confirmar Exclusão</h2>
            <p class="text-center">Tem certeza que deseja excluir este doce permanentemente?</p>
            
            <form action="excluir_doce.php?id=<?php echo $doce_id; ?>" method="POST">
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="cardapio.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-confirm">Confirmar Exclusão</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>