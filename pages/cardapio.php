<?php include '../includes/conn.php'; ?>
<?php include '../includes/menu.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cardápio - La Sucré</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff8f0;
            padding-top: 80px;
        }

        .cardapio-titulo {
            text-align: center;
            margin-bottom: 40px;
            color: #412C01;
        }

        .doce-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .doce-card:hover {
            transform: translateY(-5px);
        }

        .doce-card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .doce-card .card-body {
            background-color: white;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .doce-nome {
            font-weight: bold;
            color: #412C01;
        }

        .doce-descricao {
            color: #5e5e5e;
            margin-bottom: 15px;
        }

        .card-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn-editar {
            background-color: #FFC107;
            border: none;
            color: #412C01;
        }

        .btn-editar:hover {
            background-color: #E0A800;
            color: #412C01;
        }

        .btn-excluir {
            background-color: #DC3545;
            border: none;
            color: white;
        }

        .btn-excluir:hover {
            background-color: #C82333;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="cardapio-titulo">Nosso Cardápio</h2>
        <div class="row g-4">
            <?php
                $sql = "SELECT doce_cod, doce_nome, doce_descricao, doce_url_img FROM doces";
                $resultado = $conn->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo '
                        <div class="col-md-4">
                            <div class="card doce-card h-100">
                                <img src="../' . $row['doce_url_img'] . '" class="card-img-top" alt="' . htmlspecialchars($row['doce_nome']) . '">
                                <div class="card-body">
                                    <h5 class="doce-nome">' . htmlspecialchars($row['doce_nome']) . '</h5>
                                    <p class="doce-descricao">' . htmlspecialchars($row['doce_descricao']) . '</p>
                                    <div class="card-actions">
                                        <a href="editar_doce.php?id=' . $row['doce_cod'] . '" class="btn btn-sm btn-editar">Editar</a>
                                        <a href="excluir_doce.php?id=' . $row['doce_cod'] . '" class="btn btn-sm btn-excluir" onclick="return confirm(\'Tem certeza que deseja excluir este doce?\')">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p class="text-center">Nenhum doce cadastrado ainda.</p>';
                }

                $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>