<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="shortcut icon" href="../img/Imagotipo.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Perfil</title>
</head>

<body>
    <?php
    session_start();
    include '../src/CdMain.php';
    include '../src/Conexion.php';
    include("../src/PublicacionesyForos.php");
    if (!isset($_SESSION["Identificación"])) {
        echo "<script> Swal.fire({
            title: '😕',
            icon:'info',
            showDenyButton: false,
            showCancelButton: false,
            text: 'Su Sesión Ha Expirado, Inicie Nuevamente',
            confirmButtonText: 'Ok',
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = '../index.php'; 
            } 
          })
          </script>";
    } else {
        $id = $_SESSION['Identificación'];
        $nombre = $_SESSION['Nombre'];
        $apellido = $_SESSION['Apellido'];
        $telefono = $_SESSION['Telefono'];
        $fechaNacimiento = $_SESSION['FechaNacimiento'];
        $edad = $_SESSION['edad'];
    }
    ;
    ?>
    <section id="contenedor-navbar">
        <nav>
            <div class="logo">
                <a href="Main.php" class="Logo_desk"><img src="../img/Logo.svg" alt="Logotipo Sempiterno"
                        width="50%"></a>
                <a href="Main.php" class="Logo_mobile"><img src="../img/Imagotipo.svg" alt="Logotipo Sempiterno"
                        width="50%"></a>
            </div>
            <div class="config">
                <div class="icon-notificacion">
                    <a href="" style="text-decoration: none; color: #1a3467;"><i class="fa-solid fa-bell"></i></a>
                </div>
                <div class="dropdown-perfil">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <span class="hidden-phone-data">
                            <?= $_SESSION["Nombre"] ?>
                            <?= $_SESSION["Apellido"] ?>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-perfil" id="dropdown-perfil">
                        <li class="dropdown-item"> <a class="NuevaPestana" href="MiPerfil.php" style="color: black;">Mi
                                Perfil</a></li>
                        <li class="dropdown-item"> <a class="NuevaPestana" href="EditarPerfil.php"
                                style="color: black;">Editar Perfil</a></li>
                        <li class="dropdown-item"> <a class="NuevaPestana" href="CambiarContraseña.php"
                                style="color: black;">Cambiar Contraseña</a></li>
                        <li class="dropdown-item">
                            <form method="post" action="Main.php" id="CerrarSesion">
                                <input type="submit" name="Cerrar_Sesion" value="Cerrar Sesión" class="Cerrar_sesion">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <div class="main">
        <section id="contenedor-sidebar">
            <div class="secciones">
                <a class="NuevaPestana side-nuevapestaña" href="Main.php">
                    <div class="foros">
                        <i class="fa-solid fa-comments"></i><span id="under_pub">FOROS</span>
                    </div>
                </a>

                <a class="NuevaPestana side-nuevapestaña" href="Publicaciones.php">
                    <div class="publicaciones mt-4">
                        <i class="fa-solid fa-book-bible "></i><span id="under_pub">PUBLICACIONES</span>
                    </div>
                </a>
                <hr class="separador-secciones">
                <div class="titulo">
                    <i class="fa-solid fa-people-roof"></i> <span id="under_grup">GRUPOS</span>
                </div>
                <div class="grupos">
                    <a href=""> <i class="fa-solid fa-circle g1"></i> Danza</a><br>
                    <a href=""> <i class="fa-solid fa-circle g2"></i> Alabanza</a><br>
                    <a href=""> <i class="fa-solid fa-circle g3"></i> Limpieza</a><br>

                </div>
            </div>
        </section>

        <div id="contenido-principal">
            <section id="EDITAR-PERFIL">
                <div class="card-editar-perfil">
                    <div class="volver-foro" onclick="window.location.replace('Main.php')">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h1 style="color: #1a3467;">Editar Perfil</h1>

                    <form method="post" action="Main.php">
                        <div class="formulario-">
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" required value="<?= $nombre ?>"
                                    name="nuevoNombre">
                            </div>
                            <div class="mb-3">
                                <label for="Apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="Apellido" required value="<?= $apellido ?>"
                                    name="nuevoApellido">
                            </div>
                            <div class="mb-3">
                                <label for="Indentificacion" class="form-label">Identificación</label>
                                <input type="number" class="form-control" id="Identificacion" required
                                    value="<?= $id ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Fecha_Nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" required id="Fecha_Nacimiento"
                                    value="<?= $fechaNacimiento ?>" name="nuevoNacimiento">
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="Telefono" required
                                    value="<?= $telefono ?>" name="nuevoTelefono">
                            </div>
                            <div class="mb-3">
                                <label for="Contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="Contraseña" required
                                    placeholder="Ingrese Su contraseña Actual" name="Contraseña">
                            </div>
                        </div>
                        <div class="botones">
                            <div class="ModificarCuenta">
                                <input type="submit" value="Guardar Cambios" class="Modificar" name="Modificar">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>