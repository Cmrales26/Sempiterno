<?php

include("Conexion.php"); // Solicitamos la conexión a la base de datos. 


if (!empty($_POST['Crear'])) { // Verificamos que los datos del registro  usuario no esten vacios. 
    if (empty($_POST['Nombre']) or empty($_POST['Apellido']) or empty($_POST['Identificacion']) or empty($_POST['Nacimiento']) or empty($_POST['Telefono']) or empty($_POST['Contrasena']) or empty($_POST['ValidadContrasena'])) {
        echo "<script>alert('Hay campos Vacios');</script>";
    } else { // En caso de no ser vacios, Los almacenamos en variables 
        $nombre = $_POST['Nombre']; // Variable obtenida del formulario
        $apellido = $_POST['Apellido'];// Variable obtenida del formulario
        $id = $_POST['Identificacion'];// Variable obtenida del formulario
        $nacimiento = $_POST['Nacimiento'];// Variable obtenida del formulario
        $tele = $_POST['Telefono'];// Variable obtenida del formulario
        $pass = $_POST['Contrasena'];// Variable obtenida del formulario
        $valpass = $_POST['ValidadContrasena'];// Variable obtenida del formulario

        if ($pass != $valpass) { // Verificamos que ambos campos del formulario (Contraseña y validar) coincidan, En caso de que no, manda una alerta
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las contraseñas no coinciden',
                confirmButtonColor: '#6C4784'
              });</script>";
            return;
        }

        // Mediante la funcion Edad Podemos calcular la edad del usuario en base a su fecha de nacimiento. 
        $edad = Edad($nacimiento);
        // $fechaNacimiento = new DateTime($nacimiento);


        // Se agrega la conexión y se insertan los datos en la base de datos
        $sql = $conexion->query("INSERT INTO usuarios(ID_USUARIO, Nombre, Apellido, Contraseña, Telefono,FechaNacimiento,Edad)
        values('$id', '$nombre', '$apellido', '$pass', '$tele', '$nacimiento','$edad')");

        // En caso de que la sentencia sql sea exitosa, Mandará una alerta de registro exitoso. 
        if ($sql == 1) {
            echo "<script> Swal.fire({
                title: '👍',
                icon:'success',
                showDenyButton: false,
                showCancelButton: false,
                text: 'Se ha registrado Correctamente',
                confirmButtonText: 'Ok',
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = '../index.php'; 
                } 
              })
              </script>";
              
        } else { // En caso de fallar mandará una alerta de error
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error en la base de datos',
                confirmButtonColor: '#6C4784'
              });</script>";
        }
    }

}

// FUNCIÓN PARA OBTENER LA EDAD
function Edad($fechaNacimiento) //Recibe como parametro una fecha de nacimiento
{
    $fechaActual = new DateTime(); //Obteiene la fecha Actual
    $fechaNacimiento = new DateTime($fechaNacimiento); //Obtiene la fecha de nacimiento en base al parametro de entrdada
    $diff = $fechaActual->diff($fechaNacimiento); // Calcula la diferencia entre las fechas
    return $diff->y; // Retorna la diferencia en años. 
}
?>