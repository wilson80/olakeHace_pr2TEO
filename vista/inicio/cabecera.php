<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tarjetas Scroll</title>
    <style>
        /* Estilos básicos para la cabecera, cuerpo, pie de página y desplazamiento de tarjetas */
    </style>
</head>
<body>

<header>
    <!-- Cabecera similar a la imagen -->
    <h1>iCloud</h1>
</header>

<div class="card-container">
    <button id="prev" onclick="prevCard()">&#x25C0;</button>
    <div class="card-scroll">
        <?php foreach ($cards as $card): ?>
            <div class="card">
                <h3><?php echo $card['title']; ?></h3>
                <p><?php echo $card['description']; ?></p>
                <a href="<?php echo $card['link']; ?>">Descargar</a>
            </div>
        <?php endforeach; ?>
    </div>
    <button id="next" onclick="nextCard()">&#x25B6;</button>
</div>

<footer>
    <!-- Pie de página similar a la imagen -->
    <p>Tu plan: Estándar - 5 GB</p>
    <p>Espacio en uso: 4.98 GB de 5 GB</p>
</footer>

<script>
    let currentIndex = 0;
    const cards = document.querySelectorAll('.card');
    const maxCards = 5; // Cambiar según la cantidad máxima visible

    function updateCards() {
        cards.forEach((card, index) => {
            card.style.display = (index >= currentIndex && index < currentIndex + maxCards) ? 'block' : 'none';
        });
    }

    function nextCard() {
        if (currentIndex + maxCards < cards.length) currentIndex++;
        updateCards();
    }

    function prevCard() {
        if (currentIndex > 0) currentIndex--;
        updateCards();
    }

    updateCards(); // Inicializa la vista
</script>

</body>
</html>
