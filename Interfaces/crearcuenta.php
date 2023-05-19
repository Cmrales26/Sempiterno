<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/crear.css">
    <link rel="shortcut icon" href="../img/Imagotipo.svg" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Iniciar Sesión</title>
</head>

<body>
    <section id="CrearCuenta">
        <div class="container mb-3 position-absolute top-50 start-50 translate-middle">
            <div class="row row2">
                <h1 style="margin-top: -5%; color: #1A3467; padding-bottom: 4%;">Registro</h1>
                <?php
                include("../src/RegistrarCuenta.php");
                include("../src/Conexion.php");
                ?>

                <form method="post" action="crearcuenta.php">
                    <div class="formulario-crear">

                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="Apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="Apellido" name="Apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="Indentificacion" class="form-label">Identificación</label>
                            <input type="number" class="form-control" id="Identificacion" name="Identificacion"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="Fecha_Nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="Fecha_Nacimiento" name="Nacimiento" required>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="Telefono" name="Telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="Contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="Contraseña" name="Contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="Vali_Contraseña" class="form-label">Validar Contraseña</label>
                            <input type="password" class="form-control" id="Vali_Contraseña" name="ValidadContrasena"
                                required>
                        </div>
                    </div>
                    <div class="botones">
                        <div class="CrearCuenta">
                            <input type="submit" value="Crear Cuenta" class="Crear" name="Crear">
                        </div>
                    </div>
                </form>


                <div class="crear-cuenta">
                    <p>¿Ya tienes una cuenta? <a href="../index.php">Inicia Sesión</a></p>
                </div>

            </div>



            <div class="row row1">
                <div class="logo">
                    <img src="../img/Logo.svg" alt="" width="50%">
                </div>
                <div class="imagen">
                    <img src="../img/CrearCuenta/Mobile-login.svg" alt="">
                </div>
            </div>


        </div>
    </section>
</body>

</html>
</body>

</html>