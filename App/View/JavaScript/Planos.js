document.addEventListener("DOMContentLoaded", function () {
    const selectPlano = document.getElementById("plano-selecionado");
    const beneficiosExtras = document.querySelectorAll(".extra-beneficio");
    const resumoBeneficios = document.getElementById("resumo-beneficios");
    const precoFinal = document.getElementById("preco-final");
    const btnConfirmar = document.getElementById("confirmar-plano");

    // Preços base dos planos
    const precosPlanos = {
        "basico": 99.90,
        "padrao": 199.90,
        "premium": 299.90
    };

    function atualizarResumo() {
        const planoSelecionado = selectPlano.value;
        let precoAtual = precosPlanos[planoSelecionado];
        let beneficiosSelecionados = [];
        
        beneficiosExtras.forEach(checkbox => {
            if (checkbox.checked) {
                beneficiosSelecionados.push(checkbox.value);
                precoAtual += parseFloat(checkbox.dataset.preco);
            }
        });

        resumoBeneficios.innerHTML = `<strong>Plano Selecionado:</strong> ${planoSelecionado.toUpperCase()}<br>` +
            `<strong>Benefícios Extras:</strong> ${beneficiosSelecionados.length > 0 ? beneficiosSelecionados.join(", ") : "Nenhum"}`;
        precoFinal.textContent = `Preço Final: R$ ${precoAtual.toFixed(2)}`;
    }

    // Atualiza o resumo ao mudar o plano
    selectPlano.addEventListener("change", atualizarResumo);

    // Atualiza o resumo ao marcar/desmarcar benefícios
    beneficiosExtras.forEach(checkbox => {
        checkbox.addEventListener("change", atualizarResumo);
    });

    btnConfirmar.addEventListener("click", function () {
        alert("Plano confirmado com sucesso! Confira seu resumo abaixo:\n" + resumoBeneficios.innerHTML.replace(/<br>/g, "\n"));
    });

    atualizarResumo(); // Inicializa os valores ao carregar a página
});
