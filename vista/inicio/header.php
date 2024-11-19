 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos generales de la página */
        /* Estilos generales de la página */


body {
    margin: 0;
    padding: 0;
    color: #333;
    padding-top: 0px;
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #003a7c, #c2dfff); /* Fondo azul difuminado */
    align-items: center;
    display: flex;
    flex-direction: column;
}

/* Estilo general del header */
header {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between; /* Espaciado entre los elementos */
    background: linear-gradient(to right, #001b4e, #003a7c);
    padding: 10px 20px;
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño */
}

/* Contenedor para los íconos del lado derecho */
.header-right {
    display: flex;
    align-items: center;
    gap: 15px; /* Espacio entre los íconos */
}

/* Estilo para el botón */
.header-button {
    background-color: #ffffff;
    border: 2px solid #003366;
    color: #003366;
    padding: 8px 16px;
    border-radius: 50%; /* Forma circular, al igual que los íconos */
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.2s ease, color 0.2s ease;
}

/* Efecto hover en el botón */
.header-button:hover {
    background-color: #003366;
    color: #ffffff;
}

/* Estilo general de los íconos */
.header-right div {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background-color: #ffffff;
    border-radius: 50%; /* Forma circular */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.header-right div i {
    color: #003366;
    font-size: 20px;
}

/* Efecto hover en los íconos */
.header-right div:hover {
    transform: scale(1.1);
    background-color: #f0f0f0;
}

/* Media query para pantallas pequeñas */
@media (max-width: 768px) {
    header {
        flex-wrap: wrap;
    }
    .header-right {
        justify-content: flex-end;
    }
}



 /* Contenedor del popup */
 .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0.3s, opacity 0.3s;
        z-index: 1000;
    }

    /* Mostrar el popup */
    .popup-overlay.show {
        visibility: visible;
        opacity: 1;
    }

    /* Contenido del popup */
    .popup-content {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        width: 400px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .popup-content h2 {
        color: #003a7c;
        margin-bottom: 20px;
    }

    /* Botones dentro del popup */
    .popup-content .btn-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .popup-content button {
        background-color: #003a7c;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .popup-content button:hover {
        background-color: #002244;
    }

    /* Botón para cerrar el popup */
    .close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #003a7c;
    }

    .close-popup:hover {
        color: #002244;
    }






</style>

<header>







<!-- Popup -->
<div class="popup-overlay" id="popup">
    <div class="popup-content">
        <button class="close-popup" onclick="closePopup()">&times;</button>
        <h2>¿Cómo deseas continuar?</h2>
        <div class="btn-container">
            <button onclick="handlePopupOption('login')">Iniciar Sesión o registrate</button>
            <button onclick="handlePopupOption('guest')">Continuar como Invitado</button>
        </div>
    </div>
</div>


























    <div  class="logo">
        <a onclick="showPopup()">
            
            <img src="assets/img/logo.png" alt="Logo" style="height: 40px;">
        </a>
        <a href="?c=login">

            <button class="header-button">Ingresar</button>
        </a>
    </div>
    <div>

        <p style="color: #c2dfff;">username: INVITADO</p></div>

    <div class="header-right">
        <!-- Botón antes de los íconos -->
        <a onclick="showPopup()">
            <button class="header-button">Home</button>

        </a>
      
      


        <a onclick="showPopup()">
            <button class="header-button" title="Los eventos a los que te haz apuntado">Mis eventos</button>

        </a>
        <a onclick="showPopup()">

            <div><i class="fa-solid fa-bell"></i></div>
        </a>


<a onclick="showPopup()">

    <div><i class="fa-solid fa-user"></i></div> <!-- Este es el último ícono -->
</a>
        
    </div>
</header>





<script>
    // Función genérica para manejar el evento onclick
    function handlePopupOption(option) {
        if (option === 'login') {

            window.location.href = "?c=login";


        } else if (option === 'guest') {
            alert('Continuando como invitado...');
            // Aquí puedes agregar lógica específica para continuar como invitado
        }
        closePopup(); // Cerrar el popup después de seleccionar una opción
    }

    // Mostrar el popup
    function showPopup() {
        const popup = document.getElementById('popup');
        popup.classList.add('show');
    }

    // Cerrar el popup
    function closePopup() {
        const popup = document.getElementById('popup');
        popup.classList.remove('show');
    }


    // Cerrar el popup al hacer clic fuera del contenido
    window.addEventListener('click', (e) => {
        const popup = document.getElementById('popup');
        if (e.target === popup) {
            closePopup();
        }
    });
</script>




</html>