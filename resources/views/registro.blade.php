

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">     

    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Incluye los scripts de Bootstrap y tu código JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-12">
            <h1>Actividad 2 - Seguridad Web</h1>
            <h2>Implementación de validaciones del lado del servidor y autenticación</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h1>Inicio de sesión</h1>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
