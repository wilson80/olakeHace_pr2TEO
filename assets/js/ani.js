// Variables para la navegación de tarjetas
let scrollIndex = 0;
const cardWidth = 220; // 200px ancho + 20px margen
const visibleCards = 6; // Cantidad de tarjetas visibles a la vez
const cardScroll = document.querySelector('.card-scroll');
const totalCards = document.querySelectorAll('.card').length;







        // Función para abrir el modal formularioooo
        function abrirModal() {
            document.getElementById("overlay").style.display = "block";
        }
        
        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById("overlay").style.display = "none";
        }
        
        // Cerrar el modal si se hace clic fuera del contenido del modal
        window.onclick = function(event) {
            const modal = document.getElementById("overlay");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

        



 

function updateScroll() {
    cardScroll.style.transform = `translateX(-${scrollIndex * cardWidth}px)`;
}

function moveLeft() {
    scrollIndex = (scrollIndex <= 0) ? totalCards - visibleCards : scrollIndex - 1;
    updateScroll();
}

function moveRight() {
    scrollIndex = (scrollIndex >= totalCards - visibleCards) ? 0 : scrollIndex + 1;
    updateScroll();
}



function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

// Cierra el menú si haces clic fuera de él
window.onclick = function(event) {
    if (!event.target.matches('.menu-btn')) {
        const dropdowns = document.getElementsByClassName("dropdown-menu");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
}




        // // Configura la fecha del evento aquí (formato: "Año-Mes-Día Hora:Minuto:Segundo")
        // const eventDate = new Date("2024-12-25 00:00:00").getTime();

        // // Actualiza el contador cada segundo
        // const countdownInterval = setInterval(() => {
        //     const now = new Date().getTime();
        //     const timeLeft = eventDate - now;

        //     // Calcula días, horas, minutos y segundos restantes
        //     const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        //     const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

        //     // Muestra el resultado en el contenedor con id="countdown"
        //     document.getElementById("countdown").innerHTML = `${days} Días ${hours} Horas`;

        //     // Si la cuenta regresiva ha terminado
        //     if (timeLeft < 0) {
        //         clearInterval(countdownInterval);
        //         document.getElementById("countdown").innerHTML = "El evento ha comenzado";
        //     }
        // }, 1000);






        









 
    // document.getElementById('submit-publication').addEventListener('click', function(event) {
document.getElementById('form-publication').addEventListener('submit', function(event) {
  
    event.preventDefault(); // Evita el envío inmediato del formulario
    
    // Obtener los valores de los campos
    const titulo = document.getElementById('titulo').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();
    const fechaHora = document.getElementById('fecha-hora').value.trim();
    const lugar = document.getElementById('lugar').value.trim();
    const categoria = document.getElementById('categoria').value;
    const tipo = document.getElementById('tipo').value;
    const cantidadAsistentes = document.getElementById('cantidad-asistentes').value.trim();
    
    // Validar campos obligatorios
    if (!titulo || !descripcion || !fechaHora || !lugar || !categoria || !tipo) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    // Validar la cantidad de asistentes si está habilitada
    if (!document.getElementById('cantidad-asistentes').disabled && !cantidadAsistentes) {
        alert('Por favor, ingresa la cantidad de asistentes o desactiva el campo.');
        return;
    }

    alert('Formulario enviado exitosamente.');
    this.submit();
    // Si todas las validaciones pasan, mostramos el mensaje de éxito
    
    // // Limpiar los campos del formulario
    // document.getElementById('form-publication').reset(); // Resetea el formulario
});

 

// Botón para activar/desactivar "Cantidad de asistentes"
document.getElementById('sin-limite').addEventListener('click', function() {
    const input = document.getElementById('cantidad-asistentes');
    if (input.disabled) {
        input.disabled = false;
        this.innerText = 'Activar';
    } else {
        input.disabled = true;
        input.value = ''; // Limpiar el valor si se desactiva
        this.innerText = 'Desactivar';
    }
});

 



let dataIdGlobal = null;

function guardarDataId(elemento) {
    dataIdGlobal = elemento.getAttribute('data-id');
    // alert("dataid");
    // console.log("data-id guardado:", dataIdGlobal);
}


//identificar boton seleccionado

function redirectToController(button) {
    // Obtener el valor de data-id del botón
    const id = button.getAttribute('data-id');
    
    // Construir la URL para redireccionar, incluyendo el controlador, acción y el parámetro
    // const url = `?c=admin&filtrar&a=mostrarPub&id=${id}&filtro=${dataIdGlobal}`;
    const url = `?c=admin&filtrar&a=mostrarPub&id=${id}`;
    


    // Redirigir a la URL
    window.location.href = url;
} 
