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
    <title>Document</title>
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
                        <li class="dropdown-item">Mi perfil</li>
                        <li class="dropdown-item">Editar Perfil</li>
                        <li class="dropdown-item">Cambiar Contraseña</li>
                        <li class="dropdown-item">Modo Oscuro</li>
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
            <div class="btn-iniciar">
                <button id="iniciarnuevoforo" onclick="escribirnuevoforo()">Iniciar Nuevo Foro</button>
                <button id="iniciarnuevapublicacion" onclick="escribirnuevapublicacion()">Crear Nueva
                    Publicación</button>
            </div>
            <div class="secciones">
                <div class="foros">
                    <i class="fa-solid fa-comments"></i><span id="under_foro">FOROS</span>
                </div>
                <div class="publicaciones mt-4">
                    <i class="fa-solid fa-book-bible "></i> <span id="under_pub">PUBLICACIONES</span>
                </div>
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
            <section id="FORO">
                <div class="filtro-foro">

                    <div class="dropdown">
                        <button class="btn dropdown-toggle dropdown-toggle-filtro" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Filtro
                        </button>
                        <ul class="dropdown-menu" id="dropdown-perfil">
                            <li class="dropdown-item">
                                <form method="post" action="Main.php" id="MasReciente">
                                    <input type="submit" name="MasReciente" value="Mas Reciente" class="MasReciente">
                                </form>
                            </li>
                            <li class="dropdown-item">
                                <form method="post" action="Main.php" id="MasAntiguo">
                                    <input type="submit" name="MasAntiguo" value="Mas Antiguo" class="MasAntiguo">
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="nuevoforo-btn" onclick="escribirnuevoforo()">
                        <i class="fa-solid fa-plus"></i> Nuevo Foro
                    </div>
                </div>
                <div class="ContenedorForos" id="ContenedorForos">
                    <?php
                    obtenerForo();
                    ?>
                </div>
            </section>

            <section id="PUBLICACIONES">
                <div class="filtro-foro">
                    <div class="nuevapub-btn" onclick=" escribirnuevapublicacion()">
                        <i class="fa-solid fa-plus"></i> Nueva Publicación
                    </div>
                </div>

                <?php
                obtenerPublicacion()
                    ?>

            </section>

            <section id="EDITAR-PERFIL">
                <div class="card-editar-perfil">
                    <div class="volver-foro" onclick="cargarForo()">
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

            <section id="CAMBIAR-CONTRASENA">
                <div class="card-cambiar-contrasena">
                    <div class="volver-foro" onclick="cargarForo()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h1 style="color: #1a3467;">Modificar contraseña</h1>

                    <form method="post" action="Main.php">
                        <div class="mb-3">
                            <label for="Contrasena-antigua" class="form-label">Contraseña Actual</label>
                            <input type="password" class="form-control" id="Contrasena-antigua"
                                name="Contrasena_antigua" required>
                        </div>
                        <div class="mb-3">
                            <label for="Contrasena-nueva" class="form-label">NuevaContraseña</label>
                            <input type="password" class="form-control" id="Contrasena-nueva" name="Contrasena_nueva"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="Vali_Contrasena-nueva" class="form-label">Validar Contraseña</label>
                            <input type="password" class="form-control" id="Vali_Contrasena-nueva"
                                name="Vali_Contrasena_nueva" required>
                        </div>
                        <div class="botones">
                            <div class="boton-cambiar-contrasena">
                                <input type="submit" value="Cambiar Contraseña" class="Modificar-contrasena"
                                    name="Modificar_contrasena">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <section id="miPerfil">
                <div class="Header-MiPerfil">
                    <div class="SobremiPerfil">
                        <div class="Nombre-pefil">
                            <h1>
                                <a href="Main.php" style="text-decoration: none; color:white; cursor: pointer"><i
                                        class="fa-solid fa-arrow-left"></i></a>
                                <?= $nombre ?>
                                <?= $apellido ?>
                            </h1>
                        </div>
                        <div class="datos_Perfil">
                            <p>No. Identificación:
                                <?= $id ?> &nbsp Edad:
                                <?= $edad ?> &nbsp Teléfono:
                                <?= $telefono ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="ContenidoPrincipal">
                    <div class="Secciones-Perfil">
                        <button type="button" class="btnMisForos" id="MisForos">Mis Foros</button>
                        <button type="button" class="btnMisPublicaciones" id="MisPublis">Mis Publicaciones</button>
                    </div>
                </div>


                <div class="MisForos" id="MisForos_contenido">
                    <?php
                    obtenermisForo();
                    ?>
                </div>



                <div class="MisPublicaciones" id="MisPublicaciones">
                    <?php
                    obtenermisPublicaciones();
                    ?>
                </div>
            </section>

            <section id="ESCRIBIR-FORO">
                <div class="contenedor-escribir-foro">
                    <div class="volver-foro" onclick="cargarForo()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h3 style="color: #1a3467; text-align: center;">NUEVO FORO</h3>

                    <form method="post" action="Main.php">
                        <div class="asunto-escribir-foro">
                            <label for="asunto-foro" class="label-asunto">Asunto:</label>
                            <input type="text" id="asunto-foro" name="Asunto" required>
                        </div>
                        <div class="descripcion-escribir-foro">
                            <p class="label-descripcion">Descripción:</p>
                            <textarea name="Descripcion" id="descripcion-foro" required></textarea>
                        </div>
                        <label for="Fecha_cierre" class="label-fecha-cierre-mobile">Fecha de cierre del foro:</label>
                        <div class="fecha-escribir-foro">
                            <label for="Fecha_cierre" class="label-fecha-cierre">Fecha de cierre del foro:</label>
                            <input type="datetime-local" name="Fecha_cierre" id="Fecha_cierre" required>
                        </div>
                        <div class="btn-publicar-foro">
                            <input type="submit" value="Publicar Foro" class="publicar-foro" name="PublicarForo">
                        </div>
                    </form>
                </div>
            </section>

            <section id="ESCRIBIR-PUBLICACION">
                <div class="contenedor-escribir-publicacion">
                    <div class="volver-foro" onclick="cargarPublicaiones()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h3 style="color: #1a3467; text-align: center;">NUEVA PUBLICACIÓN</h3>
                    <hr>

                    <form action="Main.php" method="POST" enctype="multipart/form-data">
                        <div class="descripcion-escribir-publicacion">
                            <label for="descripcion" class="label-descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion-publicacion" required></textarea>
                        </div>

                        <div class="agregarala-img-publicacion">
                            <div class="preview preview-off">
                                <img id="file-ip-1-preview">
                            </div>
                            <div class="agregar-imagen-pub">
                                <label for="file-ip-1"> Agregar Imagen <i
                                        class="fa-sharp fa-solid fa-file-arrow-up"></i></label>
                                <input type="file" name="imagen" id="file-ip-1" accept="image/*"
                                    onchange="showPreview(event);">
                            </div>
                        </div>
                        <div class="btn-publicar">
                            <input type="submit" value="Publicar" name="Publ" class="publicar">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script src="../js/main.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>