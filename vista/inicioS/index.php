<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola Ke Hace - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo opaco */
        }
        .login-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 200px;
            height: 200px;
        }
        .login-form {
            max-width: 400px;
            margin: auto;
        }
        .form-control {
            border-radius: 30px;
        }
        .btn-primary {
            border-radius: 30px;
        }
        .guest-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center">
                <div class="logo-container">
                    <!-- Logo de Ola Ke Hace -->
                    <img src="assets/img/logo.png" alt="Ola Ke Hace Logo">
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-container">
                    <h2 class="text-center mb-4">olaKeHace</h2>

                    <form hr class="login-form" action="?c=user" method="POST">
                            <!-- <input type="hidden" class="form-control" id="rol" name="rol" value="algo"> -->
                    
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Escriba su nombre de usuario  " required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Escriba su constrasena" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                        <div class="guest-link">
                            <a href="#">Iniciar como invitado</a>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="keepLogged">
                            <label class="form-check-label" for="keepLogged">Mantener sesión iniciada</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
