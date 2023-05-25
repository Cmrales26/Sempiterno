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
    <title>Editar Publicación</title>
    <link rel="stylesheet" href="../style/main.css">
</head>

<body>
    <?php
    include "Conexion.php";

    if (isset($_POST['actpub'])) {
        $id_editar = $_POST['id_editar'];
        $Descripcion = $_POST['Descripcion'];
        $q = $conexion->query("UPDATE publicaciones SET  Descripcion = '$Descripcion' WHERE ID_PUB =$id_editar ");

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
    }
    ?>

    <div id="contenido-principal-actpub">
        <section id="ACTUALIZAR-PUBLICACION">
            <div class="contenedor-actualizar-publicacion">
                <div class="volver-foro" onclick="window.location.replace('../Interfaces/MiPerfilPub.php')">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <h3 style="color: #1a3467; text-align: center;" id="h3-editarPub">EDITAR PUBLICACIÓN</h3>
                <hr>
                <?php
                $id = $_REQUEST['id'];
                $sql = $conexion->query("SELECT * From publicaciones WHERE ID_PUB = $id");
                $res = mysqli_fetch_array($sql);

                echo "<form action='EditarPublicacion.php' method='POST' enctype='multipart/form-data'>";
                echo "    <div class='descripcion-escribir-publicacion'>";
                echo "        <label for='descripcion-publicacion-editar' class='label-descripcion'>Descripción:</label>";
                echo "        <textarea name='Descripcion' id='descripcion-publicacion-editar' required>" . $res['Descripcion'] . "</textarea>";
                echo "        <input type='text' id='PublicacionEliminar' name='id_editar' value='" . $res['ID_PUB'] . "'>";
                echo "    </div>";
                echo "";
                echo "        <div class='btn-actualizar'>";
                echo "            <input type='submit' value='Actualizar Descripción' name='actpub' class='actualizarpub'>";
                echo "        </div>";
                echo "    </div>";
                echo "</form>";
                ?>

            </div>
        </section>
    </div>
</body>