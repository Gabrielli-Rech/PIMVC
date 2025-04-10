document.addEventListener("DOMContentLoaded", function () {
    var carouselElement = document.querySelector("#carouselExampleIndicators");

    if (carouselElement) {
        var carousel = new bootstrap.Carousel(carouselElement, {
            interval: 3000, // Troca de slide a cada 3 segundos
            wrap: true, // Permite que o carrossel reinicie quando chegar ao último slide
            pause: "hover" // Pausa quando o mouse estiver sobre o carrossel
        });

        // Controles dos botões de navegação manual
        document.querySelector(".carousel-control-prev").addEventListener("click", function () {
            carousel.prev();
        });

        document.querySelector(".carousel-control-next").addEventListener("click", function () {
            carousel.next();
        });
    }
});
