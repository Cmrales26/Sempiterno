<?php
require 'Conexion.php';

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
            <div class='card-foro' id=" . $row['ID-FORO'] . ">
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
            <div class='vermas-foro'>
                <a href='#'><i class='fa-sharp fa-solid fa-chevron-down'></i></a>
            </div>
        </div>
        ";
    }
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


?>