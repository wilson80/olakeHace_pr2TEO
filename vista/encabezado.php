<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JonFutbol</title>
  <link rel="stylesheet" href="assets/css/encabezado.css">  
  </style>
</head>
<body>


<!-- <a href="http://localhost/PracticaTEO_abstraccion-EquipoFutbol-/" class="boton-personalizado">Ir a Ejemplo</a> -->
<a href="http://localhost/PracticaTEO_abstraccion-EquipoFutbol-/" class="boton-personalizado">Hello Word!!! <br><br>MUNDIAL DE FUTBOL</a>

<!-- <a href="?c=newInfo" class="botonNewForm" id="botonCarruc">Agregar</a> -->
<a href="?c=newInfo" class="botonNewForm" id="botonCarruc">Agregar</a>




<div class="carousel-container">
  <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-slide">
        <div>
          <h1>Dale un vistazo a los Equipos de este Mundial 2024</h1>
          <br><br>
          <h3 style="text-align: right;">Muchas sorpresas en este MUNDIAL </h3>
        </div>  

        <img src="assets/img/algo12.png" alt="Icono 111111">
<br>
        <a href="?c=jugador" class="boton" id="botonCarruc">Ver mas</a>
        <!-- <a href="?c=jugador"  id="botonCarrucel1">dos</a> -->
      </div>
      <div class="carousel-slide">
        <img src="assets/img/algo12.png" alt="Icono 1">
        <h1>Estos son los Sorprendentes Encuentros de este Mundial</h1>
        <br><br>
        <a href="?c=encuentro" class="boton" id="botonCarruc">Ver mas</a>
        <h3 style="text-align: right;">Conoce todo sobre los jugadores en este Mundial</h3>
      </div>
      <div class="carousel-slide">
        <h2 style="text-align: right;">Sorprendente, esto son los mejores Jugadores del Mundial</h2>
        <a href="?c=tops" class="boton" id="botonCarruc">Ver mas</a>
        <img src="assets/img/algo12.png" alt="Icono 3">
      </div>

      <div class="carousel-slide">
        <h2 style="text-align: right;">Todos los jugadores de la temporada, esto son los mejores Jugadores del Mundial</h2>
        <a href="?c=alls" class="boton" id="botonCarruc">Ver mas</a>
        <img src="assets/img/algo12.png" alt="Icono 3">
      </div>


    </div>
  </div>

  <div class="carousel-buttons">
    <button id="prevBtn">&lt;</button>
    <button id="nextBtn">&gt;</button>
  </div>
  
  <div class="carousel-dots">
    <span class="active"></span>
    <span></span>
    <span></span>
  </div>
</div>

<button class="scroll-to-top" id="scrollToTopBtn"></button>

<script>
  const slides = document.querySelectorAll('.carousel-slide');
  const dots = document.querySelectorAll('.carousel-dots span');
  const title = document.querySelector('.fixed-title');
  const scrollToTopBtn = document.getElementById('scrollToTopBtn');
  const botonCarrucel1 = document.getElementById('botonCarrucel1');
  let currentIndex = 0;

  const titles = [
    "HEllor Words",
    "Segunda Diapositiva",
    "Tercera Diapositiva"
  ];

  document.getElementById('nextBtn').addEventListener('click', () => {
    moveToNextSlide();
  });

  document.getElementById('prevBtn').addEventListener('click', () => {
    moveToPrevSlide();
  });

  function updateCarousel() {
    document.querySelector('.carousel').scrollLeft = currentIndex * document.querySelector('.carousel-slide').offsetWidth;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[currentIndex].classList.add('active');
    title.textContent = titles[currentIndex];
  }

  function moveToNextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateCarousel();
  }

  function moveToPrevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateCarousel();
  }

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      currentIndex = index;
      updateCarousel();
    });
  });

  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) { // Muestra el botón después de 200px de scroll
      scrollToTopBtn.style.display = 'block';
    } else {
      scrollToTopBtn.style.display = 'none';
    }
  });

  scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Añadir comportamiento de desplazamiento al botón "Botón carrucel 1"
  botonCarrucel1.addEventListener('click', (event) => {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
    window.scrollBy({ top: 1600, behavior: 'smooth' }); // Desplaza 100px hacia abajo
  });
</script>
<br><br><br><br><br>
<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br> -->



</body>
</html>
