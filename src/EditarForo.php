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
    <title>Editar Foro</title>
</head>

<body>
    <?php
    require 'Conexion.php';

    if (isset($_POST['EditarForo'])) {
        $id_eliminar = $_POST['id_editar'];
        $asunto = $_POST['Asunto'];
        $Descripcion = $_POST['Descripcion'];
        $Fecha_cierre = $_POST['Fecha_cierre'];
        $q = $conexion->query("UPDATE foro SET Asunto = '$asunto', Descripcion = '$Descripcion', Cierre_foro = '$Fecha_cierre' WHERE ID_FORO = $id_eliminar ");

        if ($q) {
            header("Location: ../Interfaces/MiPerfil.php ");
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

    <div class="editar-foro-main">
        <div id="EditarForo">
            <section id="Editar-FORO">
                <div class="contenedor-editar-foro">
                    <div class="volver-foro" onclick="window.location.replace('../Interfaces/MiPerfil.php')">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h4 style="color: #1a3467; text-align: center;">EDITAR FORO</h4>

                    <form method="post" action="EditarForo.php">
                        <?php
                        $id = $_REQUEST['id'];
                        $query = "SELECT * FROM foro WHERE  ID_FORO = '$id'";
                        $rs = mysqli_query($conexion, $query);
                        $res = mysqli_fetch_array($rs);
                        ?>
                        <div class="asunto-escribir-foro">
                            <label for="asunto-foro" class="label-asunto-editar">Asunto:</label>
                            <input type="text" id="asunto-foro" name="Asunto" value="<?= $res['Asunto'] ?>">
                            <input type="text" id="id_editar" name="id_editar" value="<?php echo $id ?>">
                        </div>
                        <div class="descripcion-escribir-foro">
                            <p class="label-descripcion-editar">Descripción:</p>
                            <textarea name="Descripcion" id="descripcion-foro-editar"
                                required><?= $res['Descripcion'] ?></textarea>
                        </div>
                        <div class="fecha-escribir-foro">
                            <label for="Fecha_cierre" class="label-fecha-cierre-editar">Fecha de cierre del
                                foro:</label>
                            <input type="datetime-local" name="Fecha_cierre" id="Fecha_cierre" required
                                value="<?= $res['Cierre_foro'] ?>">
                        </div>
                        <div class="btn-publicar-foro">
                            <input type="submit" value="Editar Foro" class="publicar-foro" name="EditarForo">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</body>