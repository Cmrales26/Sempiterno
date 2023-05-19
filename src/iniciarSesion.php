<?php
require 'Conexion.php'; // Requerimos El archivo de Conexión para poder utilizar su variable en este archivo.
session_start(); //Iniciamos Sessión para manipular los datos del usuario que inicio sesion

if (!empty($_POST['ingresar'])) { // Validamos que el botón ingresar no se encuentre con datos vacios;

    //Es IMPORTANTE Tener en cuenta que no se esta validando el estado de los datos vacios en el formulario debido a que estos inputs poseen el atributo required el cual evita en cualquier momento el envio de formularios con datos vacios. 

    $id = $_POST['Identificacion']; //Obtenemos la identificacion ingresada por el usuario.
    $pass = $_POST['Contraseña']; // Obtenemos la contraseña ingresada por el usuario.
    
    
    $query = "SELECT COUNT(*) as count FROM usuarios WHERE ID_USUARIO = '$id' and Contraseña = '$pass'";
    // Existe Solamente maximo un registro valido para esta petición, ya que, aunque las contraseñas se puedan duplicar, la identificación es UNICA para cada usuario por lo realizar esta petición nos permite contar cuantos registros se encuentran con id x y contraseña y. Debido a la condición dada anteriormente, en caso de encontrar uno el resultado sera exitoso y en caso de que no será un fracaso.

    $rs = mysqli_query($conexion, $query); // Leemos el resultado obtenido por el query.
    $resultados = mysqli_fetch_array($rs); // Almacenamos el resultado en un Array, Aquí es importante tener en cuenta de que al ser MAXIMO 1 registro con la condición siempre que se halle un registro el resultado sera [0] y cuando no se halle sera de []
    
    if ($resultados['count'] > 0) { // Si el registro mas de 0 registros ingresa
        $_SESSION['Identificación'] = $id; // Guardamos en nuestra sesion la ID del usuario. Esto nos permitirá generar busquedas en base al usuario, una vez este ingresado. 
        header("Location: ./Interfaces/Main.php"); // Cambiamos la vista. 
    } else { // Sino Manda una alerta 
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Usuario o Contraseña Incorrecta',
            confirmButtonColor: '#6C4784'
            });</script>";
        return;
    }
}
?>