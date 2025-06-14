<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
   
    <header>
        <?php include 'includes/menu.php'; ?>
    </header>

    <section class="py-5 bg-light" id="inicio">
        <div class="container">
            <div class="row align-items-center">

                <!-- Texto -->
                <div class="col-md-6">
                    <img src="assets/img/LOGO.webp" id="img-top" class="d-block mx-auto mb-4" alt="Logo La Sucré">

                    <h2 class="display-5 fw-bold titulo-chamada">Vai um docinho aí?</h2>
                    <p class="lead">
                        Conheça o nosso novo lançamento: <strong>Donuts fresquinhos e irresistíveis</strong>,
                        preparados com todo carinho pra adoçar seu dia. Experimente agora mesmo!
                    </p>
                    <a href="#contato" class="btn btn-contato btn-lg mt-3">Quero provar</a>
                </div>
                <!-- Imagem -->
                <div class="col-md-6 text-center img-donuts">
                    <img src="assets/img/image1.webp" alt="Donuts sendo jogados para cima" class="img-fluid rounded shadow">
                </div>

            </div>
        </div>
    </section>

    <div id="carouselBanners" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores (bolinhas) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/banner1.webp" class="d-block w-100" alt="Banner 1" id="Banner-1">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Você nunca viu algo assim</h3>
                    <p>Escolha seu sabor favorito e se deixe levar.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/banner2.webp" class="d-block w-100" alt="Banner 2" id="Banner-2">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Você vai querer mais de um... A gente garante.</h3>
                    <p>Uma mordida e pronto: o difícil é parar.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/banner3.webp" class="d-block w-100" alt="Banner 3" id="Banner-3">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Recheado com sabor. Finalizado com amor.</h3>
                    <p>Faça seu pedido sob medida para eventos e festas!</p>
                </div>
            </div>
        </div>

        <!-- Controles (setas) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>



    <section class="py-5 bg-light" id="galeria-doces">
        <div class="container">
            <h2 class="text-center mb-5">Os queridinhos da casa</h2>
            <div class="row">
                <!-- Galeria de imagens -->
                <div class="col-md-6 d-grid gap-3" style="grid-template-columns: repeat(3, 1fr);">
                    <img src="assets/img/bolo-de-festa.webp" alt="Bolo de Festa"
                        class="img-galeria img-fluid rounded shadow-sm" onclick="mostrarDescricao(0)">
                    <img src="assets/img/surpresa-doce.webp" alt="Surpresa Doce"
                        class="img-galeria img-fluid rounded shadow-sm" onclick="mostrarDescricao(1)">
                    <img src="assets/img/bolo-no-palito.webp" alt="Bolo no Palito"
                        class="img-galeria img-fluid rounded shadow-sm" onclick="mostrarDescricao(2)">
                    <img src="assets/img/rosa-de-chocolate.webp" alt="Rosa de Chocolate"
                        class="img-galeria img-fluid rounded shadow-sm" onclick="mostrarDescricao(3)">
                    <img src="assets/img/donuts.webp" alt="Donuts" class="img-galeria img-fluid rounded shadow-sm"
                        onclick="mostrarDescricao(4)">
                    <img src="assets/img/muffin-castanha.webp" alt="Muffin de Castanha"
                        class="img-galeria img-fluid rounded shadow-sm" onclick="mostrarDescricao(5)">
                </div>

                <!-- Área de descrição -->
                <div class="col-md-6">
                    <div id="descricao-doce" class="p-4 rounded shadow-sm bg-white">
                        <h3 id="tituloDoce" class="mb-3">Escolha um doce 🍰</h3>
                        <p id="textoDescricao" class="lead">Clique em uma das imagens à esquerda para saber mais.</p>
                        <a href="#contato" class="btn btn-contato mt-3">Quero esse!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="depoimentos" style="background-color: #fff6f9;">
        <div class="container">
            <h2 class="text-center mb-5">O que estão falando de nós</h2>
            <div class="row g-4">
                <!-- Depoimento 1 -->
                <div class="col-md-4">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="assets/img/ana-luiza.jpg" alt="Ana Luiza" class="rounded-circle me-3 img-perfil"
                                width="50" height="50">
                            <div>
                                <h6 class="mb-0">Ana Luiza</h6>
                                <small class="text-muted">5 estrelas</small>
                                <div class="text-warning">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">O melhor donut que já comi na vida! Macio, fresquinho e com muito recheio.
                            Atendimento incrível também.</p>
                    </div>
                </div>

                <!-- Depoimento 2 -->
                <div class="col-md-4">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="assets/img/bruno-martins.jpg" alt="Bruno Martins" class="rounded-circle me-3 img-perfil"
                                width="50" height="50">
                            <div>
                                <h6 class="mb-0">Bruno Martins</h6>
                                <small class="text-muted">5 estrelas</small>
                                <div class="text-warning">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">A La Sucré é puro encanto! O sabor dos doces é incomparável e a loja é um charme
                            só.</p>
                    </div>
                </div>

                <!-- Depoimento 3 -->
                <div class="col-md-4">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="assets/img/camila-souza.jpg" alt="Camila Souza" class="rounded-circle me-3 img-perfil"
                                width="50" height="50">
                            <div>
                                <h6 class="mb-0">Camila Souza</h6>
                                <small class="text-muted">5 estrelas</small>
                                <div class="text-warning">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">Pedi para uma festa e foi sucesso absoluto! Já estou planejando o próximo
                            pedido!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">

                <!-- Texto -->
                <div class="col-md-6">
                    <h2 class="mb-4">A La Sucré</h2>
                    <p class="lead">
                        Somos apaixonados por transformar açúcar em carinho.
                        A La Sucré nasceu do desejo de levar momentos doces e inesquecíveis para o seu
                        dia a dia.
                    </p>
                    <p>
                        Nossos doces são preparados artesanalmente, com ingredientes selecionados e um toque de amor em
                        cada receita.
                        Aqui, cada sabor conta uma história, e cada detalhe é feito pensando em você.
                    </p>
                    <p class="fw-bold">Do nosso forno direto para o seu coração 💕</p>
                </div>

                <!-- Imagem ilustrativa -->
                <div class="col-md-6 text-center">
                    <img src="assets/img/equipe.webp" alt="Equipe La Sucré" class="img-fluid rounded shadow">
                </div>

            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/galeria.js"></script>
</body>

</html>
