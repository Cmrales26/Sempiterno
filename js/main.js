// Seleccion de todas las secciones de la pagina para manipulacion del DOM
const foro = document.getElementById("FORO");
const publicaciones = document.getElementById("PUBLICACIONES");
const editarPerfil = document.getElementById("EDITAR-PERFIL");
const cambiarContrasena = document.getElementById("CAMBIAR-CONTRASENA");
const escribirForo = document.getElementById("ESCRIBIR-FORO");
const publicarPub = document.getElementById("ESCRIBIR-PUBLICACION");

// Seleccion de las descoraciones de las secciones
const under_foro = document.getElementById("under_foro");
const under_pub = document.getElementById("under_pub");

// Selecionamos los Botones de iniciar foro  y publicaciones
const iniciar_foro = document.getElementById("iniciarnuevoforo");
const iniciar_pub = document.getElementById("iniciarnuevapublicacion");

// Al realizar el primer inicio de carga o al reiniciar se condicionan las vistas en el contenedor principal
window.onload = (event) => {
    cargarForo(); // Se ejecuta la funcion cargarForo
}

const cargarForo = () => {
    foro.classList.remove("FORO-OFF"); // se remuve la clase foro off para reactivar su vista
    under_foro.classList.add("under-foros"); // se agrega la descoracion 
    under_pub.classList.remove("under-pub"); // se remueve la descoracion
    iniciar_pub.classList.add("iniciarnuevapublicacion-off"); // Se eliminar el boton inicar publicacion
    iniciar_foro.classList.remove("iniciarforo-off"); // Se agrega el boton inicar foro
    document.title = "Foro Sempiterno"; // Se establece el titulo de la pagina
    publicaciones.classList.add("PUBLICACIONES-OFF"); // Se apagan las publicaciones
    editarPerfil.classList.add("EDITAR-PERFIL-OFF"); // Se apagan el editar perfil
    cambiarContrasena.classList.add("CAMBIAR-CONTRASENA-OFF"); // Se apaga el cambiar contraseña
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
}
const cargarPublicaiones = () => {
    iniciar_pub.classList.remove("iniciarnuevapublicacion-off"); // Se agrega el boton crear publicacion
    iniciar_foro.classList.add("iniciarforo-off"); // Se elimina el boton iniciar nuevo foro
    under_foro.classList.remove("under-foros"); // Se remuve la decoracion de foro
    under_pub.classList.add("under-pub"); // Se agrega la decoracion de publicacion
    document.title = "Publicaciones Sempiterno"; // Se establece el titulo de la pagina
    foro.classList.add("FORO-OFF");// se apagan los foros
    publicaciones.classList.remove("PUBLICACIONES-OFF"); // Se activan las publicaciones
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
}
const cargarEditarPerfil = () => {
    foro.classList.add("FORO-OFF"); // se agrega la clase foro off ocultarla
    under_foro.classList.remove("under-foros"); // se remueve la decoracion 
    under_pub.classList.remove("under-pub"); // se remueve la descoracion
    iniciar_pub.classList.add("iniciarnuevapublicacion-off"); // Se eliminar el boton inicar publicacion
    iniciar_foro.classList.add("iniciarforo-off"); // Se elimina el boton iniciar foro
    document.title = "Editar Perfil"; // Se establece el titulo de la pagina
    publicaciones.classList.add("PUBLICACIONES-OFF"); // Se apagan las publicaciones
    editarPerfil.classList.remove("EDITAR-PERFIL-OFF"); // Se encide la vista del editar perfil
    cambiarContrasena.classList.add("CAMBIAR-CONTRASENA-OFF"); // Se apaga el cambiar contraseña
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
}
const cargarCambiarContrasena = () => {
    foro.classList.add("FORO-OFF"); // se agrega la clase foro off ocultarla
    under_foro.classList.remove("under-foros"); // se remueve la decoracion 
    under_pub.classList.remove("under-pub"); // se remueve la descoracion
    iniciar_pub.classList.add("iniciarnuevapublicacion-off"); // Se eliminar el boton inicar publicacion
    iniciar_foro.classList.add("iniciarforo-off"); // Se elimina el boton iniciar foro
    document.title = "Editar Perfil"; // Se establece el titulo de la pagina
    publicaciones.classList.add("PUBLICACIONES-OFF"); // Se apagan las publicaciones
    editarPerfil.classList.add("EDITAR-PERFIL-OFF"); // Se encide la vista del editar perfil
    cambiarContrasena.classList.remove("CAMBIAR-CONTRASENA-OFF"); // Se apaga el cambiar contraseña
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
}

document.querySelector(".foros").addEventListener("click", (event) => {
    cargarForo(); // Se ejecuta la funcion
});

document.querySelector(".publicaciones").addEventListener("click", (event) => {
    cargarPublicaiones() // Se ejecuta la funcion
});



//! OPTENER LOS VALORES DEL ul - li

const perfil_menu = document.querySelectorAll("#dropdown-menu li"); // Optenemos del Dropdown Menu todos los hijos

let tab = []; // Creamos un array vacio en el que se almacenaran los elementos "li"
var index; // Creamos una variable auxilixar indice en la que se guardará el estado del array

for (var i = 0; i < perfil_menu.length; i++) {
    tab.push(perfil_menu[i].innerHTML); // Almacenamos en el array cada uno de los datos anexados a los indices de "li" en el dropdown menu
}

for (var i = 0; i < perfil_menu.length; i++) {
    perfil_menu[i].onclick = function () {
        //THIS ME PERMITE ACCEDER AL ELEMENTO EN EL QUE ESTO DANDO CLICK
        index = tab.indexOf(this.innerHTML); // Le asigno el valor de this a la variable aulixiar index

        //COMPARO PARA REALIZAR LA FUNCIONES PARA CADA UNO DE LOS CASOS
        if (this.innerHTML === "Editar Perfil") { // En caso de dar clic en editar perfil
            cargarEditarPerfil(); //Carga la funcion editar perfil
        } else if (this.innerHTML === "Cambiar Contraseña") { // En caso de dar clic en cambiar contraseña
            cargarCambiarContrasena(); // Cargar la funcion cambiar contraseña
        } else if (this.innerHTML === "Modo Oscuro") { // En caso de dar clic en modo oscuro  
            alert("Esta función aun no se encuentra habilitada"); //? Pronto la funcion xd
        }
    }
}

// Escribir un nuevo foro
iniciar_foro.addEventListener("click", (event) => {
    document.title = "Nuevo foro"// Se agrega el nuevo titulo
    escribirForo.classList.remove("ESCRIBIR-FORO-OFF"); // se remueve la clase para ser mostrado
    foro.classList.add("FORO-OFF");
})

//Escribr una nueva publicación
iniciar_pub.addEventListener("click", (event) => {
    document.title = "Nuevo Publicación" // Se agrega el nuevo titulo
    publicarPub.classList.remove("ESCRIBIR-PUBLICACION-OFF"); // se remueve la clase para ser mostrado
    publicaciones.classList.add("PUBLICACIONES-OFF");
})

// Preview de la imagen a cargar
const showPreview = (event) => {
    if (event.target.files.length > 0) { // Valida que exista por lo menos una imagen que cargar

        //! event.target.files[0] Me obtiene la informacion de la imagen en la posicion [0]

        let src = URL.createObjectURL(event.target.files[0]); // Le asigno a la variable src los metadatos de la imagen y creo una url temporal
        const preview_container = document.querySelector(".preview"); // Optengo el contenedor de la imagen
        preview_container.classList.remove("preview.off"); // Muestro el contenedor de la imagen
        preview_container.classList.add("preview-on"); // Muestro el contenedor de la imagen
        const preview = document.getElementById("file-ip-1-preview"); // optengo la etiqueta img donde se cargará la imagen
        preview.src = src; // al elemento src de la etiqueta img le agrego el link optenido en la variable src
        preview.style.display = "block"; // a la etiqueta img le asigno un display block
    }
}