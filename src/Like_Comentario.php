<?php
require 'Conexion.php';
date_default_timezone_set('America/Bogota');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $cardId = $_POST['id'];
        $query = "SELECT * FROM publicaciones as publicaciones INNER JOIN usuarios as usuarios ON publicaciones.Usuario_id = usuarios.ID_USUARIO WHERE publicaciones.ID_PUB = $cardId";
        $result = mysqli_query($conexion, $query) or die("Algo ha ido mal en la consulta a la base de datos");


        while ($row = mysqli_fetch_array($result)) {
            $temp_id_pub = $row['ID_PUB'];

            if (base64_encode($row['Imagen']) !== "") {


                echo
                    "
                <div class='card-publicaciones' id = 'card-publicaciones'>
                ";

                echo "
                            <div class='info-publicacion'>
                                <div class='autor-publicacion'>
                                <a href='Publicaciones.php' style='text-decoration: none; color:#1A3467; cursor: pointer'><i class='fa-solid fa-arrow-left'></i></a>
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
                                <div class='like-publicacion Like_False' id='like-publicacion'>
                                <i class='fa-solid fa-heart' id = 'Silike'></i>
                                <i class='fa-regular fa-heart' id='Nolike'></i>
                                </div>
                            </div>
                        </div>
                        ";
                        
                echo " <div class = 'card-Comentario-pub'> ";
                echo "
                <div class='Comentar-comentario'>
                    <h4>Comentar</h4>
                    <form method='POST' action='Publicaciones.php' style='display: flex; gap: 20px;'>
                        <input type='text' name='temp_id_pub' class='texto_id_pub' readonly value=" . $temp_id_pub . ">
                        <textarea placeholder='Comentar' style='resize: none;' class='form-control Comentario-content' name='Comentario_pub' required></textarea>
                        <input type='submit' class='comentar_Publicacion' value='Enviar' name='ComentarForo' id='ComentarPublicacion' />
                    </form>
                </div>";

                     
                echo "<h4 style = 'margin-bottom: 1.5rem; margin-top: 9rem; margin-left: 1.5rem'> Comentarios</h4>";

                ObtenerComentario($temp_id_pub);

                echo "</div>";
                echo "</div>";


                echo "</div>";
            } else {
                echo
                    "
            <div class='card-publicaciones' id = 'card-publicaciones'>
            ";

                echo "
                        <div class='info-publicacion'>
                            <div class='autor-publicacion'>
                            <a href='Publicaciones.php' style='text-decoration: none; color:#1A3467; cursor: pointer'><i class='fa-solid fa-arrow-left'></i></a>
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
                            <div class='like-publicacion Like_False' id='like-publicacion'>
                            <i class='fa-solid fa-heart' id = 'Silike'></i>
                            <i class='fa-regular fa-heart' id='Nolike'></i>
                            </div>
                        </div>
                    </div>
                    ";


                echo " <div class = 'card-Comentario-pub'> ";
                echo "
            <div class='Comentar-comentario'>
                <h4>Comentar</h4>
                <form method='POST' action='Publicaciones.php' style='display: flex; gap: 20px;'>
                    <input type='text' name='temp_id_pub' class='texto_id_pub' readonly value=" . $temp_id_pub . ">
                    <textarea placeholder='Escribir un Comentario' style='resize: none;' class='form-control Comentario-content' name='Comentario_pub' required></textarea>
                    <input type='submit' class='comentar_Publicacion' value='Comentar' name='ComentarForo' id='ComentarPublicacion' />
                </form>
            </div>";
                
                echo "<h4 style = 'margin-bottom: 1.5rem; margin-top: 9rem; margin-left: 1.5rem'> Comentarios</h4>";
                

                ObtenerComentario($temp_id_pub);

                echo "</div>";
                echo "</div>";


                echo "</div>";
            }
        }
    }
}

function ObtenerComentario($id)
{
    global $conexion;
    $sql = "SELECT COUNT(*) as Conteo FROM com_pub AS comentario INNER JOIN publicaciones AS publicaciones ON comentario.Pub_id = publicaciones.ID_PUB INNER JOIN usuarios as usuarios ON comentario.Usuario_id = usuarios.ID_USUARIO WHERE Pub_id = '$id'";

    $rs_cant_fr = mysqli_query($conexion, $sql);
    $rs_cant_arr = mysqli_fetch_array($rs_cant_fr);

    if ($rs_cant_arr['Conteo'] == 0) {
        echo "
        <div class='Comentarios-foro-null'>
            <h5> No hay Comentarios en esta Publicación</h5>
        </div>";
    } else {
        $sql_comentarios = "SELECT * FROM com_pub AS comentario INNER JOIN publicaciones AS publicaciones ON comentario.Pub_id = publicaciones.ID_PUB INNER JOIN usuarios as usuarios ON comentario.Usuario_id = usuarios.ID_USUARIO WHERE Pub_id = '$id'";

        $rs = mysqli_query($conexion, $sql_comentarios);


        while ($row = mysqli_fetch_array($rs)) {
            echo "<section class='Contenedor_comentario Contenedor_comentario-pub'>";
            echo "<div class='Comentario_uniq-pub'>";
            echo "<div class='header_comentario_pub'>";
            echo "<div class='Usuario-comentario-pub'>";
            echo "<h5>" . $row['Nombre'] . " " . $row['Apellido'] . "</h5>";
            echo "<p>" . $row['Fecha_pub'] . "</p>";
            echo "</div>";
            echo "</div>";

            echo "<div class='Contenido_Comentario'>";
            echo "<p>" . $row['Contenido'] . "</p>";
            echo "</div>";
            echo "<hr class='SepararComentario-pub'>";
            echo "</div>";
            echo "</section>";
        }
    }
}

function AgregarComentarioPub()
{
    global $conexion;
    $Contenido = $_POST['Comentario_pub'];
    $fechaActual = date("Y-m-d H:i:s");
    $usid = $_SESSION['Identificación'];
    $Pub_id = $_POST['temp_id_pub'];

    $query = "INSERT INTO com_pub(Contenido, Fecha_Pub, Estado, Usuario_id, Pub_id) VALUES('$Contenido', '$fechaActual', '1', '$usid', '$Pub_id')";

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
    AgregarComentarioPub();
}

?>