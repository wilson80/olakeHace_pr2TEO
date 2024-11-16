 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola Ke Hace - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Enlace al archivo CSS externo -->
    <style>

.mensaje-error {
    background-color: #f8d7da; /* Rojo claro */
    color: #721c24; /* Rojo oscuro */
    padding: 15px;
    border-radius: 8px;
    font-size: 16px;
    font-family: 'Arial', sans-serif;
    text-align: center;
    margin: 10px 0;
    border: 1px solid #f5c6cb; /* Borde rojo claro */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    animation: fadeIn 0.5s ease-out; /* Animación para que aparezca suavemente */
}

/* Animación para la entrada del mensaje */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}



    </style>
</head>
<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="login-container">
            <div class="logo-container">
                <img src="assets/img/logo.png" alt="Ola Ke Hace Logo">
            </div>
            <h2 class="text-center mb-4">olaKeHace</h2>
            <form class="login-form" action="?c=login" method="POST">


        
            
 
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="mensaje-error">
                        El Usuario o contraseña ingresados son incorrectos.
                    </div>
                    <?php unset($_SESSION['error']); // no mostrar nuevamente ?>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Escriba su nombre de usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Escriba su contraseña" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
                <div class="guest-link">
                    <a href="?c=inicio">Iniciar como invitado</a>
                </div>
                <div class="guest-link">
                    <a href="?c=registro">Registrarse ahora!</a>
                </div>
 
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
