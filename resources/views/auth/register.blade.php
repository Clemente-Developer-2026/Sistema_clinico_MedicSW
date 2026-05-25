<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Centro de Salud Villa Tunari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <h4 class="text-center mb-4 text-success fw-bold">Registro de Nuevo Usuario</h4>
                        <p class="text-center text-muted mb-4">Complete sus datos para ingresar al sistema clínico.</p>

                        @if ($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">Registrarse</button>
                                <a href="{{ route('login') }}" class="btn btn-link text-decoration-none">¿Ya tienes una cuenta? Inicia sesión aquí</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>