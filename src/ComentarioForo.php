<?php
require 'Conexion.php';
date_default_timezone_set('America/Bogota');

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
                        <input type = 'text' name ='temp_id_foro' class='texto_id_foro' readonly value = " . $temp_id_foro . ">
                        <input type = 'text' name ='texto_comentario_foro' class='texto_comentario_foro' required placeholder='Escribir un comentario'/>
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

function agregarComentario(){
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