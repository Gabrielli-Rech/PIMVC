document.getElementById("adicionar-treino").addEventListener("click", function() {
    // Coletando os dados dos inputs
    const grupo = document.getElementById("grupo-muscular").value;
    const nomeExercicio = document.getElementById("nome-exercicio").value;
    const descricaoExercicio = document.getElementById("descricao-exercicio").value;
    const imagemExercicio = document.getElementById("imagem-exercicio").files[0];

    if (!nomeExercicio || !descricaoExercicio || !imagemExercicio) {
        alert("Preencha todos os campos.");
        return;
    }

    // Criando um novo exercício
    const newExercicio = document.createElement("div");
    newExercicio.classList.add("exercicio");

    const img = document.createElement("img");
    img.src = URL.createObjectURL(imagemExercicio);
    img.alt = nomeExercicio;
    img.style.width = "80px";
    img.style.height = "80px";
    img.style.objectFit = "cover";
    img.style.marginRight = "15px";
    img.style.borderRadius = "50%";

    const detalhes = document.createElement("div");
    detalhes.classList.add("detalhes");

    const h3 = document.createElement("h3");
    h3.textContent = nomeExercicio;

    const p = document.createElement("p");
    p.textContent = descricaoExercicio;

    detalhes.appendChild(h3);
    detalhes.appendChild(p);
    newExercicio.appendChild(img);
    newExercicio.appendChild(detalhes);

    // Inserindo o novo exercício na seção correspondente
    const grupoSelecionado = document.querySelector(`.grupo h2:contains(${grupo})`).parentElement;
    grupoSelecionado.appendChild(newExercicio);

    // Limpando os campos
    document.getElementById("nome-exercicio").value = '';
    document.getElementById("descricao-exercicio").value = '';
    document.getElementById("imagem-exercicio").value = '';
});
