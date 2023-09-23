

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
        <div class="row">
            <div class="col-12">
                <h1>Actividad 2 - Seguridad Web</h1>
                <h2>Implementación de validaciones del lado del servidor y autenticación</h2>

                <form method="POST" action="{{ route('store-usuario') }}">
                    @csrf

                    <br>
                    <h3>Registro</h3>
                    <br>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required autofocus placeholder="Nombre">
                            </div>                           

                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input class="form-control" type="text" name="dni" id="dni" required placeholder="12345678Z">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" type="password" name="password" id="password" required placeholder="**********">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input class="form-control" type="text" name="telefono" id="telefono" placeholder="601234567">
                            </div>                          
                           
                        </div>
                        <div class="col-6">                          
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input class="form-control" type="text" name="apellidos" id="apellidos" required placeholder="Apellido1 Apellido2">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" required autofocus placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="password">Repite contraseña</label>
                                <input class="form-control" type="password" name="password" id="password" required placeholder="**********">
                            </div>

                            <div class="form-group">
                                <label for="pais">País</label>
                                <!-- <input class="form-control" type="text" name="pais" id="pais">-->
                                <select class="form-control" name="pais" id="pais">
                                    <option>España</option>
                                    <option>Portugal</option>
                                    <option>Francia</option>
                                    <option>Alemania</option>
                                    <option>Reino Unido</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cuentaBancaria">Cuenta bancaria</label>
                        <input class="form-control" type="text" name="cuentaBancaria" id="cuentaBancaria" required placeholder="ES91 2100 0418 45 0200051332">
                    </div> 

                    <div class="form-group">
                        <label for="sobreTi">Sobre ti</label>
                        <textarea  class="form-control" type="text" name="sobreTi" id="sobreTi" rows="3" placeholder="Sobre ti"></textarea>
                    </div>

                    <br>

                    <div>
                        <a href="/" class="btn btn-light">Volver</a>
                        <button type="submit" class="btn btn-success">Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
