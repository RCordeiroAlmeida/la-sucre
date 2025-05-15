<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Acesso Restrito - La Sucré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/acesso.css">
</head>
<body>
    <div class="logo text-center my-4">
        <a href="../index.php">
            <img src="../assets/img/LOGO.webp" width="200px" alt="Logo La Sucré">
        </a>
    </div>

    <div class="container">
        <div class="acesso-container mt-5">
            <h2>Acesso Restrito</h2>
            <form action="verificar-senha.php" method="POST">
                <div class="mb-3">
                    <label for="senha" class="form-label">Digite a senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-sweet w-100">Entrar</button>
            </form>
        </div>
    </div>

</body>
</html>
