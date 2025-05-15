<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Doces - La Sucré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
</head>
<body>
    <div class="logo text-center my-4">
        <a href="../index.php">
            <img src="../assets/img/LOGO.webp" width="200px" alt="Logo La Sucré">
        </a>
    </div>


    <div class="container">
        <div class="cadastro-container mt-5">
            <h2 class="cadastro-title">Cadastro de Doces</h2>
            <form action="salvar-doce.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do doce</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto do doce</label>
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-sweet w-100">Cadastrar Doce</button>
            </form>
        </div>
    </div>

</body>
</html>
