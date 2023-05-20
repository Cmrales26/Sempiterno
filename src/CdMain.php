<?php
require 'RegistrarCuenta.php';
include("Conexion.php");


if (isset($_POST['Cerrar_Sesion'])) {
    session_destroy();
    header("Location: ../index.php ");
    exit;
}
;

function EditarPerfil()
{
    global $conexion;
    $id = $_SESSION['Identificación'];
    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoApellido = $_POST['nuevoApellido'];
    $nuevoNacimiento = $_POST['nuevoNacimiento'];
    $nuevoTelefono = $_POST['nuevoTelefono'];
    $Contraseña = $_POST['Contraseña'];
    $edad = Edad($nuevoNacimiento);

    if (!ValidarContraseña($Contraseña)) {
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Contraseña Incorrecta',
            confirmButtonColor: '#6C4784'
            });</script>";
        return;
    } else {
        $cambiodatos = $conexion->query("UPDATE usuarios SET Nombre = '$nuevoNombre', Apellido = '$nuevoApellido', Telefono = '$nuevoTelefono', FechaNacimiento = '$nuevoNacimiento', Edad = '$edad' WHERE ID_USUARIO = '$id'");

        if ($cambiodatos == 1) {
            echo "<script> Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se han actualizado los datos',
                showConfirmButton: false,
                timer: 1500
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

if (!empty($_POST['Modificar'])) {
    EditarPerfil();
    $id = $_SESSION['Identificación'];
    $datosusuariosesion = "SELECT * FROM usuarios WHERE ID_USUARIO = '$id'";
    $resultadoDatos = mysqli_query($conexion, $datosusuariosesion);
    while ($row = mysqli_fetch_array($resultadoDatos)) {
        $_SESSION['Identificación'] = $row['ID_USUARIO']; // Guardamos en nuestra sesion la ID
        $_SESSION['Nombre'] = $row['Nombre']; // Guardamos en nuestra sesion la ID
        $_SESSION['Apellido'] = $row['Apellido']; // Guardamos en nuestra sesion la ID
        $_SESSION['Telefono'] = $row['Telefono']; // Guardamos en nuestra sesion la ID
        $_SESSION['FechaNacimiento'] = $row['FechaNacimiento']; // Guardamos en nuestra sesion la ID
    }
}


function CamibiarContraseña()
{
    global $conexion;
    $Contraseña = $_POST['Contrasena_antigua'];
    $Contraseña_Nueva = $_POST['Contrasena_nueva'];
    $id = $_SESSION['Identificación'];
    if (ValidarContraseña($Contraseña) == false) {
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Contraseña Incorrecta',
            confirmButtonColor: '#6C4784'
            });</script>";
        return;
    }
    if ($_POST['Contrasena_nueva'] !== $_POST['Vali_Contrasena_nueva']) {
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las Contraseñas NO coinciden...',
            confirmButtonColor: '#6C4784'
            });</script>";
        return;
    }

    $cambiarpass = $conexion->query("UPDATE usuarios SET Contraseña = $Contraseña_Nueva WHERE ID_USUARIO = '$id'");

    if ($cambiarpass == 1) {
        echo "<script> Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'CONTRASEÑA ACTUALIZADA',
            showConfirmButton: false,
            timer: 1500
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

if (!empty($_POST['Modificar_contrasena'])) {
    CamibiarContraseña();
}
;

function ValidarContraseña($contraseña)
{
    global $conexion;
    $Contraseñabd = "";
    $id = $_SESSION['Identificación'];
    $query = "SELECT Contraseña FROM usuarios WHERE ID_USUARIO = '$id'";
    $rs = mysqli_query($conexion, $query);
    while ($row = mysqli_fetch_array($rs)) {
        $Contraseñabd = $row['Contraseña'];
    }
    if ($Contraseñabd == $contraseña) {
        return true;
    } else {
        return false;
    }
}
?>