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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include '../src/CdMain.php';
    include '../src/Conexion.php';
    $id = $_SESSION['Identificación'];
    $nombre = $_SESSION['Nombre'];
    $apellido = $_SESSION['Apellido'];
    $telefono = $_SESSION['Telefono'];
    $fechaNacimiento = $_SESSION['FechaNacimiento'];
    if (!isset($_SESSION["Sempiterno"])) {
        $_SESSION["Sempiterno"] = "Nuevo Inicio";
        echo "<script> 
        Swal.fire({
        icon:'success',
        title: '✌️',
        text: 'Bienvenido $nombre $apellido',
        timer: 1500,
        showConfirmButton: false
      });
    </script>";
    }
    ;
    ?>


    <section id="contenedor-navbar">
        <nav>
            <div class="logo">
                <a href="#"><img src="../img/Logo.svg" alt="Logotipo Sempiterno" width="50%"></a>
            </div>
            <div class="config">
                <div class="icon-notificacion">
                    <a href="" style="text-decoration: none; color: #1a3467;"><i class="fa-solid fa-bell"></i></a>
                </div>
                <div class="dropdown-perfil">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
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
                    <select class="form-select form-select-foro" aria-label="Default select example">
                        <option selected>Más Reciente</option>
                        <option value="1">Más Antiguo</option>
                    </select>
                    <div class="nuevoforo-btn" onclick="escribirnuevoforo()">
                        <i class="fa-solid fa-plus"></i> Nuevo Foro
                    </div>
                </div>
                <div class="card-foro" id="1">
                    <div class="info-foro">
                        <div class="Tematica-foro">
                            <h3>Diana Vidal</h3>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel nam quia modi veritatis,
                                deleniti in illo, at fuga, asperiores qui assumenda praesentium. Eaque, aliquam
                                veritatis! Vero voluptatem ipsam hic labore?</p>
                        </div>
                        <hr>
                        <div class="fecha-foro">
                            18/05/2023 - 31/05/2023
                        </div>
                    </div>
                    <div class="vermas-foro">
                        <a href="#"><i class="fa-sharp fa-solid fa-chevron-down"></i></a>
                    </div>
                </div>
            </section>

            <section id="PUBLICACIONES">
                <div class="filtro-foro">
                    <div class="nuevapub-btn" onclick=" escribirnuevapublicacion()">
                        <i class="fa-solid fa-plus"></i> Nueva Publicación
                    </div>
                </div>
                <div class="card-publicaciones">
                    <div class="info-publicacion">
                        <div class="autor-publicacion">
                            <h3>Diana Vidal</h3>
                        </div>
                        <div class="fecha-publicacion">Publicado: 20/12/21</div>
                    </div>
                    <div class="contenido-publicacion">
                        <div class="contenido-publicacion-texto">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu bibendum risus. Aliquam
                                sit amet posuere libero. Integer luctus, turpis at consectetur ornare, elit lectus
                                ultricies urna, a consequat nunc eros non lacus.</p>
                        </div>
                        <div class="contenido-publicacion-imagen">
                            <img src="https://www.bible.com/_next/image?url=https%3A%2F%2F%2F%2Fimageproxy.youversionapi.com%2F640x640%2Fhttps%3A%2F%2Fs3.amazonaws.com%2Fstatic-youversionapi-com%2Fimages%2Fbase%2F39359%2F1280x1280.jpg&w=3840&q=75"
                                alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="acciones-publicaciones">
                        <div class="like-publicacion">
                            <i class="fa-regular fa-heart"></i> like
                        </div>
                        <div class="comentar-publicacion">
                            <i class="fa-regular fa-comment"></i> Comentar
                        </div>
                    </div>
                </div>
            </section>

            <?php
            // echo ValidarContrasena();
                ?>

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
                                <input type="text" class="form-control" id="Nombre" required value="<?= $nombre ?>" name="nuevoNombre">
                            </div>
                            <div class="mb-3">
                                <label for="Apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="Apellido" required value="<?= $apellido ?>" name="nuevoApellido">
                            </div>
                            <div class="mb-3">
                                <label for="Indentificacion" class="form-label">Identificación</label>
                                <input type="number" class="form-control" id="Identificacion" required value="<?= $id ?>"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="Fecha_Nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" required id="Fecha_Nacimiento"
                                    value="<?= $fechaNacimiento ?>" name="nuevoNacimiento">
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="Telefono" required value="<?= $telefono ?>" name="nuevoTelefono">
                            </div>
                            <div class="mb-3">
                                <label for="Contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="Contraseña"
                                required placeholder="Ingrese Su contraseña Actual" name="Contraseña">
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
                    <div class="mb-3">
                        <label for="Contrasena-antigua" class="form-label">Contraseña Actual</label>
                        <input type="password" class="form-control" id="Contrasena-antigua">
                    </div>
                    <div class="mb-3">
                        <label for="Contrasena-nueva" class="form-label">NuevaContraseña</label>
                        <input type="password" class="form-control" id="Contrasena-nueva">
                    </div>
                    <div class="mb-3">
                        <label for="Vali_Contrasena-nueva" class="form-label">Validar Contraseña</label>
                        <input type="password" class="form-control" id="Vali_Contrasena-nueva">
                    </div>
                    <div class="botones">
                        <div class="boton-cambiar-contrasena">
                            <input type="button" value="Cambiar Contraseña" class="Modificar-contrasena">
                        </div>
                    </div>
                </div>
            </section>

            <section id="ESCRIBIR-FORO">
                <div class="contenedor-escribir-foro">
                    <div class="volver-foro" onclick="cargarForo()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h3 style="color: #1a3467; text-align: center;">NUEVO FORO</h3>
                    <div class="asunto-escribir-foro">
                        <label for="asunto-foro" class="label-asunto">Asunto:</label>
                        <input type="text" id="asunto-foro">
                    </div>
                    <div class="descripcion-escribir-foro">
                        <p class="label-descripcion">Descripción:</p>
                        <textarea name="" id="descripcion-foro"></textarea>
                    </div>
                    <label for="Fecha_cierre" class="label-fecha-cierre-mobile">Fecha de cierre del foro:</label>
                    <div class="fecha-escribir-foro">
                        <label for="Fecha_cierre" class="label-fecha-cierre">Fecha de cierre del foro:</label>
                        <input type="date" name="Fecha_cierre" id="Fecha_cierre">
                        <label for="Hora_cierre" class="label-hora-cierre"></label>
                        <input type="time" name="Hora_cierre" id="Hora_cierre">
                    </div>
                    <div class="btn-publicar-foro">
                        <button class="publicar-foro">Publicar Foro</button>
                    </div>
                </div>
            </section>

            <section id="ESCRIBIR-PUBLICACION">
                <div class="contenedor-escribir-publicacion">
                    <div class="volver-foro" onclick="cargarPublicaiones()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h3 style="color: #1a3467; text-align: center;">NUEVA PUBLICACIÓN</h3>
                    <hr>
                    <div class="descripcion-escribir-publicacion">
                        <p class="label-descripcion">Descripción:</p>
                        <textarea name="descripcion-publicacion" id="descripcion-publicacion"></textarea>
                    </div>
                    <div class="agregarala-img-publicacion">
                        <div class="preview preview-off">
                            <img id="file-ip-1-preview">
                        </div>
                        <div class="agregar-imagen-pub">
                            <label for="file-ip-1">Agregar Imagen <i
                                    class="fa-sharp fa-solid fa-file-arrow-up"></i></label>
                            <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                        </div>
                    </div>
                    <div class="btn-publicar">
                        <button class="publicar">Publicar</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>