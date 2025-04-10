const titulos = [
  "Bolo de Festa de Chocolate",
  "Surpresa Doce com Coração",
  "Bolo no Palito",
  "Rosa de Chocolate",
  "Donuts Coloridos",
  "Muffin de Castanha com Chocolate",
];

const descricoes = [
  "Nosso bolo de festa é feito com massa de chocolate super fofinha e recheio cremoso, decorado com muito capricho. Perfeito pra qualquer comemoração especial!",
  "Mini delícias de chocolate com recheio de brigadeiro e cobertura com coração. Uma explosão de sabor em cada mordida, feita pra derreter o coração.",
  "Pedaços generosos de bolo recheado no palito, cobertos com chocolate branco e confeitos crocantes. Ideal para festas e lembrancinhas cheias de estilo.",
  "Feito com massa de leite ninho e decorado com uma rosa de chocolate artesanal no topo. Delicado, saboroso e lindo – uma verdadeira obra de arte comestível.",
  "Donuts fofinhos, coloridos e cobertos com confeitos vibrantes. Além de lindos, são deliciosamente macios e vão alegrar qualquer dia com sabor e cor!",
  "Muffins de castanha com chocolate meio amargo, macios por dentro e com casquinha crocante por fora. A escolha ideal pra quem ama uma sobremesa com textura e personalidade.",
];

function mostrarDescricao(indice) {
  const titulo = document.getElementById("tituloDoce");
  const descricao = document.getElementById("textoDescricao");
  const imagens = document.querySelectorAll(".img-galeria");

  titulo.textContent = titulos[indice];
  descricao.textContent = descricoes[indice];

  imagens.forEach((img, i) => {
    if (i === indice) {
      img.classList.add("img-destaque");
    } else {
      img.classList.remove("img-destaque");
    }
  });
}
