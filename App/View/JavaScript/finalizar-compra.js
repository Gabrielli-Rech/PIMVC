document.addEventListener("DOMContentLoaded", () => {
    carregarResumoCompra();

    document.getElementById("form-pagamento").addEventListener("submit", function(event) {
        event.preventDefault();
        processarPagamento();
    });
});

function carregarResumoCompra() {
    const resumoCompra = document.getElementById("resumo-compra");
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    if (carrinho.length === 0) {
        resumoCompra.innerHTML = "<p>Seu carrinho está vazio.</p>";
        return;
    }

    let total = 0;
    let html = "<h2>Resumo da Compra</h2><ul>";
    
    carrinho.forEach(item => {
        html += `<li>${item.nome} - R$${item.preco.toFixed(2)}</li>`;
        total += item.preco;
    });
    
    html += `</ul><h3>Total: R$${total.toFixed(2)}</h3>`;
    resumoCompra.innerHTML = html;
}

function processarPagamento() {
    const cpf = document.getElementById("cpf").value;
    const endereco = document.getElementById("endereco").value;
    const metodoPagamento = document.getElementById("pagamento").value;

    if (!cpf || !endereco) {
        alert("Preencha todos os campos!");
        return;
    }

    alert("Compra realizada com sucesso!");
    localStorage.removeItem("carrinho");
    window.location.href = "index.html";
}
