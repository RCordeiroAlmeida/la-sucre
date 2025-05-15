<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Sucré | Contato</title>

    <!-- Bootstrap + Montserrat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS do site -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/contato.css">
</head>

<body>

   <?php include '../includes/menu.php';?>

    <!-- Espaço para o menu fixo -->
    <div style="height: 80px;"></div>

    <!-- Seção de contato -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">


                <!-- Imagem decorativa -->
                <div class="col-md-6 text-center">
                    <img src="../assets/img/contato.jpg" alt="Contato" class="img-fluid rounded shadow-sm img-contato">
                </div>

                <!-- Texto + formulário -->
                <div class="col-md-6 mb-4">
                    <h2 class="mb-4">Sob medida para a sua festa!</h2>
                    <p class="lead">
                        Tem um evento especial chegando? A <strong>La Sucré</strong> adoça sua celebração com doces
                        artesanais feitos com amor!
                    </p>
                    <p>
                        Preencha o formulário abaixo e vamos conversar sobre como tornar sua festa ainda mais doce 🍰✨
                    </p>


                    <!-- Formulário -->
                    <form class="form-contato mt-4">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Seu nome</label>
                            <input type="text" class="form-control" id="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensagem" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mensagem" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-enviar px-4 py-2">Enviar</button>
                    </form>
                </div>



            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>