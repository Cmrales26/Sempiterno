<?php
require 'Conexion.php';
date_default_timezone_set('America/Bogota');


//ACTUALIZAR ESTADO FORO
function borarForo()
{
    global $conexion;
    $fechaActual = date("Y-m-d H:i:s");
    $slqchage = "SELECT * FROM foro";
    $rs = $conexion->query($slqchage);
    while ($row = mysqli_fetch_array($rs)) {
        if ($fechaActual > $row['Cierre_foro']) {
            $id = $row['ID_FORO'];
            $q = "UPDATE foro SET Estado = 0 WHERE ID_FORO = $id";
            $res = $conexion->query($q);
        }
    }
    return;
}

//OBTENER FOROS

function obtenerForo()
{
    global $conexion;
    if (isset($_POST['MasReciente'])) {
        $query = "SELECT * FROM foro as foro INNER JOIN usuarios as usuarios WHERE foro.Usuario_id = usuarios.ID_USUARIO and foro.Estado = 1  ORDER BY foro.Fecha_Pub_Foro DESC";
        $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");
    } elseif (isset($_POST['MasAntiguo'])) {
        $query = "SELECT * FROM foro as foro INNER JOIN usuarios as usuarios WHERE foro.Usuario_id = usuarios.ID_USUARIO and foro.Estado = 1  ORDER BY foro.Fecha_Pub_Foro ASC";
        $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");
    } else {
        $query = "SELECT * FROM foro as foro INNER JOIN usuarios as usuarios WHERE foro.Usuario_id = usuarios.ID_USUARIO and foro.Estado = 1  ORDER BY foro.Fecha_Pub_Foro DESC";
        $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");
    }
    while ($row = mysqli_fetch_array($result)) {
        echo
            "
            <div class='card-foro' id=" . $row['ID_FORO'] . " name = 'card_foro'>
            <div class='info-foro'>
                <div class='Tematica-foro'>
                    <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                    <h5>" . $row['Asunto'] . "</h5>
                    <p>" . $row['Descripcion'] . "</p>
                </div>
                <hr>
                <div class='fecha-foro'>
                    Abrió el: " . $row["Fecha_Pub_Foro"] . " -  Cerrará el: " . $row["Cierre_foro"] . "
                </div>
            </div>
        </div>
        ";
    }
    borarForo();
}
;

function crearForo()
{
    global $conexion;
    $id = $_SESSION['Identificación'];
    $asunto = $_POST['Asunto'];
    $Descripcion = $_POST['Descripcion'];
    $fechaCierre = $_POST['Fecha_cierre'];
    $fechaActual = date("Y-m-d H:i:s");

    if ($fechaCierre < $fechaActual) {
        echo 'Ingrese otra fecha';
    } else {
        $query = $conexion->query("INSERT INTO foro(Asunto, Descripcion, Cierre_foro, Fecha_pub_Foro, Estado, Usuario_id) values('$asunto', '$Descripcion', '$fechaCierre', '$fechaActual', '1', '$id')");
        if ($query) {
            echo "<script> Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Foro Publicado con Éxito',
                showConfirmButton: false,
                timer: 500
              })
              </script>";
        } else {
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error en la base de datos',
                confirmButtonColor: '#6C4784'
              });</script>";
        }
    }

}
;

if (!empty($_POST['PublicarForo'])) {
    crearForo();
}

function crearPublicacion()
{
    global $conexion;
    $id = $_SESSION['Identificación'];
    $descripcion = $_POST['descripcion'];
    $fechaActual = date("Y-m-d H:i:s");

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenData = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    } else {
        $imagenData = null;
    }

    $query = $conexion->query("INSERT INTO publicaciones(Imagen, Descripcion,Estado,Fecha_pub, Usuario_id) VALUES ('$imagenData','$descripcion',1,'$fechaActual','$id')");

    if ($query) {
        echo "<script> Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Publicado con éxito',
            showConfirmButton: false,
            timer: 500
          })
          </script>";
    } else {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ha ocurrido un error en la base de datos',
            confirmButtonColor: '#6C4784'
          });</script>";
    }
}

if (!empty($_POST['Publ'])) {
    crearPublicacion();
}


function obtenerPublicacion()
{
    global $conexion;
    $query = "SELECT * FROM publicaciones as publicaciones INNER JOIN usuarios as usuarios WHERE publicaciones.Usuario_id = usuarios.ID_USUARIO and publicaciones.Estado = 1  ORDER BY publicaciones.Fecha_Pub DESC";

    $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");

    while ($row = mysqli_fetch_array($result)) {

        if (base64_encode($row['Imagen']) !== "") {
            echo
                "
            <div class='card-publicaciones' id=" . $row['ID_PUB'] . ">
                        <div class='info-publicacion'>
                            <div class='autor-publicacion'>
                                <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                            </div>
                            <div class='fecha-publicacion'>Publicado: " . $row['Fecha_pub'] . "</div>
                        </div>
                        <div class='contenido-publicacion'>
                            <div class='contenido-publicacion-texto'>
                                <p>" . $row['Descripcion'] . "</p>
                            </div>
                            <div class='contenido-publicacion-imagen'>
                                <img src='data:image/jpg;base64, " . base64_encode($row['Imagen']) . " 'alt=none>
                            </div>
                        </div>
                        <hr>
                        <div class='acciones-publicaciones'>
                            <div class='like-publicacion'>
                                <i class='fa-regular fa-heart'></i> Likes: 3
                            </div>
                            <div class='comentar-publicacion'>
                                <i class='fa-regular fa-comment'></i> Comentar
                            </div>
                        </div>
                    </div>
            ";
        } else {
            echo
                "
            <div class='card-publicaciones' id=" . $row['ID_PUB'] . ">
                        <div class='info-publicacion'>
                            <div class='autor-publicacion'>
                                <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                            </div>
                            <div class='fecha-publicacion'>Publicado: " . $row['Fecha_pub'] . "</div>
                        </div>
                        <div class='contenido-publicacion'>
                            <div class='contenido-publicacion-texto'>
                                <p>" . $row['Descripcion'] . "</p>
                            </div>
                        </div>
                        <hr>
                        <div class='acciones-publicaciones'>
                            <div class='like-publicacion'>
                                <i class='fa-regular fa-heart'></i> Likes: 3
                            </div>
                            <div class='comentar-publicacion'>
                                <i class='fa-regular fa-comment'></i> Comentar
                            </div>
                        </div>
                    </div>
                ";
        }
    }
}

function obtenermisForo()
{
    global $conexion;
    $id = $_SESSION['Identificación'];
    $query = "SELECT * FROM foro as foro INNER JOIN usuarios as usuarios ON foro.Usuario_id = usuarios.ID_USUARIO WHERE usuarios.ID_USUARIO = $id AND foro.Estado = 1 ORDER BY foro.Fecha_Pub_Foro DESC;";
    $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");


    $conteoResultados = "SELECT  COUNT(*) as Conteo FROM foro as foro INNER JOIN usuarios as usuarios ON foro.Usuario_id = usuarios.ID_USUARIO WHERE usuarios.ID_USUARIO = $id AND foro.Estado = 1 ORDER BY foro.Fecha_Pub_Foro DESC;";
    $rs = $conexion->query($conteoResultados);
    $rsarray = mysqli_fetch_array($rs);

    if ($rsarray['Conteo'] > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "
            <div class='card-misforos' id=" . $row['ID_FORO'] . ">
                        <div class='info-misforo'>
                            <div class='Tematica-misforo'>
                                <div class='header-misforo'>
                                    <div class='Autor-misforo'>
                                        <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                                    </div>
                                    <div class='Configuración-foro'>
                                        <div class='dropdown-foro'>
                                            <button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown'
                                                aria-expanded='false'>
                                                <i class='fa-solid fa-ellipsis'></i>
                                            </button>
                                            <ul class='dropdown-menu dropdown-foro' id='dropdown-foro'>
                                                <li class='dropdown-item'>
                                                    <form method='post' action='Main.php' id='Editar'>
                                                        <form method='post' action='Main.php' id='Editar'>
                                                            <input type='submit' name='Editar' value='Editar'
                                                                class='Editar'>
                                                        </form>
                                                    </form>
                                                </li>

                                                <li class='dropdown-item'>
                                                    <form method='post' action='Main.php' id='Eliminar'>
                                                        <form method='post' action='Main.php' id='Eliminar'>
                                                            <input type='submit' name='Eliminar' value='Eliminar'
                                                                class='Eliminar'>
                                                        </form>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h5>" . $row['Asunto'] . "</h5>
                                <p>" . $row['Descripcion'] . "</p>
                            </div>
                            <hr>
                            <div class='fecha-misforo'>
                                Abrió el: " . $row["Fecha_Pub_Foro"] . " -  Cerrará el: " . $row["Cierre_foro"] . "
                            </div>
                        </div>
                    </div>

            ";
        }
    } else {
        echo "
        <div class='NoseEncontro'>
            <div class='Mensaje-Foro'>
                <h4>NO SE ENCONTRÓ NINGÚN FORO</h4>
            </div>
            <div class='EscribirForo' onclick='escribirnuevoforo()'>
                <h6>INICIAR NUEVO FORO <i class='fa-solid fa-plus'></i></h6>
            </div>
        </div>
        ";
    }
}

function obtenermisPublicaciones()
{
    global $conexion;
    $id = $_SESSION['Identificación'];
    $query = "SELECT * FROM publicaciones as publicaciones INNER JOIN usuarios as usuarios ON publicaciones.Usuario_id = usuarios.ID_USUARIO WHERE usuarios.ID_USUARIO = $id";
    $result = $conexion->query($query);

    $contador = "SELECT COUNT(*) as Conteo FROM publicaciones as publicaciones INNER JOIN usuarios as usuarios ON publicaciones.Usuario_id = usuarios.ID_USUARIO WHERE usuarios.ID_USUARIO = $id";
    $rs = $conexion->query($contador);
    $rsaarray = mysqli_fetch_array($rs);

    if ($rsaarray['Conteo'] > 0) {

        while ($row = mysqli_fetch_array($result)) {
            if (base64_encode($row['Imagen']) !== "") {
                echo
                    "
            <div class='card-mispublicaciones'  id=" . $row['ID_PUB'] . ">
            <div class='info-mispublicacion'>
                <div class='autor-mispublicacion-opciones'>
                    <div class='autor-publicacion'>
                        <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                    </div>
                    <div class='Configuración-publi'>
                                <div class='dropdown-publi'>
                                    <button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown'
                                        aria-expanded='false'>
                                        <i class='fa-solid fa-ellipsis'></i>
                                    </button>
                                    <ul class='dropdown-menu dropdown-publi' id='dropdown-publi'>
                                        <li class='dropdown-item'>
                                            <form method='post' action='Main.php' id='Editar-pub'>
                                                <form method='post' action='Main.php' id='Editar-pub'>
                                                    <input type='submit' name='Editar-pub' value='Editar'
                                                        class='Editar-pub'>
                                                </form>
                                            </form>
                                        </li>
    
                                        <li class='dropdown-item'>
                                            <form method='post' action='Main.php' id='Eliminar-pub'>
                                                <form method='post' action='Main.php' id='Eliminar-pub'>
                                                    <input type='submit' name='Eliminar-pub' value='Eliminar'
                                                        class='Eliminar-pub'>
                                                </form>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                </div>
                <div class='fecha-publicacion'>Publicado: " . $row['Fecha_pub'] . "</div>
            </div>

            <div class'contenido-mispublicacion'>
                <div class'contenido-publicacion-texto'>
                    <p>" . $row['Descripcion'] . "</p>
                </div>
                <div class='contenido-publicacion-imagen'>
                    <img src='data:image/jpg;base64, " . base64_encode($row['Imagen']) . " 'alt=none>
                </div>
            </div>
            <hr>
            <div class='acciones-publicaciones'>
                <div class='like-publicacion'>
                    <i class='fa-regular fa-heart'></i> like
                </div>
                <div class='comentar-publicacion'>
                    <i class='fa-regular fa-comment'></i> Comentar
                </div>
            </div>
        </div>
            ";
            } else {
                echo
                    "
        <div class='card-mispublicaciones'  id=" . $row['ID_PUB'] . ">
        <div class='info-mispublicacion'>
            <div class='autor-mispublicacion-opciones'>
                <div class='autor-publicacion'>
                    <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                </div>
                <div class='Configuración-publi'>
                            <div class='dropdown-publi'>
                                <button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown'
                                    aria-expanded='false'>
                                    <i class='fa-solid fa-ellipsis'></i>
                                </button>
                                <ul class='dropdown-menu dropdown-publi' id='dropdown-publi'>
                                    <li class='dropdown-item'>
                                        <form method='post' action='Main.php' id='Editar-pub'>
                                            <form method='post' action='Main.php' id='Editar-pub'>
                                                <input type='submit' name='Editar-pub' value='Editar'
                                                    class='Editar-pub'>
                                            </form>
                                        </form>
                                    </li>

                                    <li class='dropdown-item'>
                                        <form method='post' action='Main.php' id='Eliminar-pub'>
                                            <form method='post' action='Main.php' id='Eliminar-pub'>
                                                <input type='submit' name='Eliminar-pub' value='Eliminar'
                                                    class='Eliminar-pub'>
                                            </form>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
            </div>
            <div class='fecha-publicacion'>Publicado: " . $row['Fecha_pub'] . "</div>
        </div>

        <div class'contenido-mispublicacion'>
            <div class'contenido-mispublicacion-texto'>
                <p>" . $row['Descripcion'] . "</p>
            </div>
        </div>
        <hr>
        <div class='acciones-publicaciones'>
            <div class='like-publicacion'>
                <i class='fa-regular fa-heart'></i> like
            </div>
            <div class='comentar-publicacion'>
                <i class='fa-regular fa-comment'></i> Comentar
            </div>
        </div>
    </div>
        ";
            }
        }
    } else {
        echo "
        <div class='NoseEncontro'>
            <div class='Mensaje-Foro'>
                <h4>NO SE ENCONTRÓ NINGUNA PUBLICACIÓN</h4>
            </div>
            <div class='EscribirForo' onclick='escribirnuevapublicacion()'>
                <h6>CREAR UNA PUBLICACIÓN <i class='fa-solid fa-plus'></i></h6>
            </div>
        </div>
        ";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $cardId = $_POST['id'];
        $q = "SELECT * FROM foro as foro INNER JOIN usuarios as usuarios ON foro.Usuario_id = usuarios.ID_USUARIO WHERE foro.ID_FORO = $cardId;";
        $result = mysqli_query($conexion, $q);

        while ($row = mysqli_fetch_array($result)) {
            $temp_id_foro = $row['ID_FORO'];
            echo "
            <div class='card-foro card-foro-uniq' id=" . $row['ID_FORO'] . " name = 'card_foro'>
            <div class='info-foro'>
                <div class='Tematica-foro'>
                <a href='Main.php' style='text-decoration: none; color:#1A3467; cursor: pointer'><i class='fa-solid fa-arrow-left'></i></a>
                    <h3>" . $row['Nombre'] . " " . $row['Apellido'] . "</h3>
                    <h5>" . $row['Asunto'] . "</h5>
                    <p>" . $row['Descripcion'] . "</p>
                </div>
                <hr>
            </div>
            <div class = 'comentar-foro'>
               <div class = 'CrearComentario CrearComentarioForo'>
                    <form method = 'POST' action = 'Main.php'>
                        <input type = 'text' name ='texto_comentario_foro' class='texto_comentario_foro form-label' required placeholder='Escribir un comentario'/>
                        <input type = 'text' name ='temp_id_foro' class='texto_id_foro' readonly value = " . $temp_id_foro . ">
                        <input type ='submit' class='comentar_foro' value = 'Comentar' name='ComentarForo' id='ComentarForo' />
                    </form>
               </div>
            </div>
        </div>
        ";
            ObtenerComentarioForo($temp_id_foro);
        }
    }
}

function ObtenerComentarioForo($id)
{
    global $conexion;
    $sql = "SELECT COUNT(*) as Conteo FROM com_foro AS comentario INNER JOIN foro AS foro ON comentario.Foro_id = foro.ID_FORO INNER JOIN usuarios as usuarios ON comentario.Usuario_id = usuarios.ID_USUARIO WHERE Foro_id = '$id'";

    $rs_cant_fr = mysqli_query($conexion, $sql);
    $rs_cant_arr = mysqli_fetch_array($rs_cant_fr);

    if ($rs_cant_arr['Conteo'] == 0) {
        echo "
        <div class='Comentarios-foro-null'>
            <h5> No hay Comentarios en este Foro </h5>
        </div>";
    } else {
        $sql_comentarios = "SELECT * FROM com_foro AS comentario INNER JOIN foro AS foro ON comentario.Foro_id = foro.ID_FORO INNER JOIN usuarios as usuarios ON comentario.Usuario_id = usuarios.ID_USUARIO WHERE Foro_id = '$id'";
        $rs = mysqli_query($conexion, $sql_comentarios);
        echo "<h4 class = 'tituloComentario'>Comentarios</h4>";
        while ($row = mysqli_fetch_array($rs)) {
            echo "
            <section class= 'Contenedor_comentario'>
            <div class='Comentario_uniq'>
             <div class='header_comentario_foro'>
                <div class='Usuario-comentario-foro'>
                    <h5>" . $row['Nombre'] . " " . $row['Apellido'] . "</h5>
                    <p>" . $row['Fecha_pub_com'] . "</p>
                </div>
             </div>

             <div class = 'Contenido_Comentario'>
                <p>" . $row['Contenido'] . "</p>
             </div>
             <hr class='SepararComentario'>
            </div>
            </section>
            ";
        }
    }
}

function agregarComentario()
{
    global $conexion;
    $Contenido_comentarioForo = $_POST['texto_comentario_foro'];
    $fechaActual = date("Y-m-d H:i:s");
    $id = $_SESSION['Identificación'];
    $foro_id = $_POST['temp_id_foro'];
    $query = "INSERT INTO com_foro (Contenido,Fecha_pub_com,Estado, Foro_id, Usuario_id) VALUES ('$Contenido_comentarioForo','$fechaActual','1','$foro_id','$id')";
    $rs = $conexion->query($query);

    if ($rs) {
        echo "<script> Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Comentario Publicado con Éxito',
            showConfirmButton: false,
            timer: 500
          })
          </script>";
    } else {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ha ocurrido un error en la base de datos',
            confirmButtonColor: '#6C4784'
          });</script>";
    }
}

if (!empty($_POST['ComentarForo'])) {
    agregarComentario();
}
?>