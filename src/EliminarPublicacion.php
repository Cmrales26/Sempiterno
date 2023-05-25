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
    <link rel="shortcut icon" href="../img/Imagotipo.svg" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Eliminar pub</title>
    <link rel="stylesheet" href="../style/main.css">
</head>

<?php
require 'Conexion.php';



if (isset($_POST['Eliminar-pub'])) {
    $id_eliminar = $_POST['Id_Eliminar'];
    $q = $conexion->query("UPDATE publicaciones SET Estado = 0 WHERE ID_PUB = $id_eliminar");
    if ($q) {
        header("Location: ../Interfaces/MiPerfilPub.php ");
    } else {
        echo "<script> Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ha ocurrido un error en la base de datos',
            confirmButtonColor: '#6C4784'
          });</script>";
    }



} elseif (isset($_POST['Cancelar-Eliminar-pub'])) {
    header("Location: ../Interfaces/MiPerfilPub.php ");
}
;
?>

<body>
    <section id="Eliminar-pub-sect">
        <div class="cotenerdor-eliminar-pub">
            <div class="header-elemininar-pub">
                <h4>¿Esta Seguro que desea eliminar la Siguiente Publicación?</h4>
            </div>
            <div class="card-pub-eliminar">
                <?php
                if ($_REQUEST['id'] != null) {
                    $id = $_REQUEST['id'];
                    $query = "SELECT * FROM publicaciones WHERE  ID_PUB = '$id'";
                    $rs = mysqli_query($conexion, $query);
                    $res = mysqli_fetch_array($rs);
                        echo '<div class="Contenidopub-Eliminar">';
                        echo '    <h5>';
                        echo '        ' . $res['Descripcion'];
                        echo '    </h5>';
                        echo '</div>';
                        echo '';

                }else{
                    echo '    <h5>';
                    echo '        Elemento Eliminado';
                    echo '    </h5>';
                }

                ?>

            </div>

            <div class="botoner-alert-eliminar">
                <div class="botoneliminar">
                    <form action="EliminarPublicacion.php" method="post">
                        <input type="text" name="Id_Eliminar" class="Id_Eliminar-pub" value="<?php echo $id ?>">
                        <button type="submit" id="Eliminar-pub-btn" name="Eliminar-pub">Eliminar <i
                                class="fa-solid fa-trash"></i></button>
                        <button id="Cancelar-Eliminar-pub" name="Cancelar-Eliminar-pub">Cancelar <i
                                class="fa-solid fa-ban"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>