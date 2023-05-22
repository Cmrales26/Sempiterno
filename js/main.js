// Seleccion de todas las secciones de la pagina para manipulacion del DOM
const foro = document.getElementById("FORO");
const publicaciones = document.getElementById("PUBLICACIONES");
const editarPerfil = document.getElementById("EDITAR-PERFIL");
const cambiarContrasena = document.getElementById("CAMBIAR-CONTRASENA");
const escribirForo = document.getElementById("ESCRIBIR-FORO");
const publicarPub = document.getElementById("ESCRIBIR-PUBLICACION");
const sidebar = document.getElementById("contenedor-sidebar");
const contenido_principal = document.getElementById("contenido-principal");
const MiPerfil = document.getElementById("miPerfil");

// Seleccion de las descoraciones de las secciones
const under_foro = document.getElementById("under_foro");
const under_pub = document.getElementById("under_pub");
// Sleccion de los inconos para su modificación en mobile
const foro_icon = document.querySelector(".foros")
const pub_icon = document.querySelector(".publicaciones")
const grupo_icon = document.querySelector(".titulo")

// Selecionamos los Botones de iniciar foro  y publicaciones
const iniciar_foro = document.getElementById("iniciarnuevoforo");
const iniciar_pub = document.getElementById("iniciarnuevapublicacion");

// Al realizar el primer inicio de carga o al reiniciar se condicionan las vistas en el contenedor principal
window.onload = (event) => {
    cargarForo(); // Se ejecuta la funcion cargarForo
}

const cargarForo = () => {
    MiPerfil.classList.add("miPerfil-off");
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
    foro_icon.classList.add("sectionactive"); // Le da un color a el lugar donde está hubicado
    pub_icon.classList.remove("sectionactive"); // Remueve la clase
    grupo_icon.classList.remove("sectionactive"); // Remueve la clase
    contenido_principal.style.width = "";
    contenido_principal.style.marginLeft = "";
    contenido_principal.style.padding = "";
    sidebar.classList.remove("contenedor-sidebar-OFF");
    escribirForo.style.margin = "";
    publicarPub.style.marginLeft = ""; 
    contenido_principal.style.marginTop = "";
    escribirForo.style.margin = "";
    publicarPub.style.margin = ""; 
}
const cargarPublicaiones = () => {
    MiPerfil.classList.add("miPerfil-off");
    iniciar_pub.classList.remove("iniciarnuevapublicacion-off"); // Se agrega el boton crear publicacion
    iniciar_foro.classList.add("iniciarforo-off"); // Se elimina el boton iniciar nuevo foro
    under_foro.classList.remove("under-foros"); // Se remuve la decoracion de foro
    under_pub.classList.add("under-pub"); // Se agrega la decoracion de publicacion
    document.title = "Publicaciones Sempiterno"; // Se establece el titulo de la pagina
    foro.classList.add("FORO-OFF");// se apagan los foros
    publicaciones.classList.remove("PUBLICACIONES-OFF"); // Se activan las publicaciones
    editarPerfil.classList.add("EDITAR-PERFIL-OFF"); // Se apagan el editar perfil
    cambiarContrasena.classList.add("CAMBIAR-CONTRASENA-OFF"); // Se apaga el cambiar contraseña
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
    foro_icon.classList.remove("sectionactive"); // Remueve la clase
    pub_icon.classList.add("sectionactive"); // Le da un color a el lugar donde está hubicado
    grupo_icon.classList.remove("sectionactive"); // Remueve la clase
    contenido_principal.style.width = "";
    contenido_principal.style.marginLeft = "";
    contenido_principal.style.padding = "";
    sidebar.classList.remove("contenedor-sidebar-OFF");
    escribirForo.style.margin = "";
    publicarPub.style.marginLeft = ""; 
    contenido_principal.style.marginTop = "";
    escribirForo.style.margin = "";
    publicarPub.style.margin = ""; 
}
const cargarEditarPerfil = () => {
    MiPerfil.classList.add("miPerfil-off");
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
    sidebar.classList.remove("contenedor-sidebar-OFF");
    contenido_principal.style.width = "";
    contenido_principal.style.marginLeft = "";
    contenido_principal.style.padding = "";
    escribirForo.style.margin = "";
    publicarPub.style.marginLeft = ""; 
    contenido_principal.style.marginTop = "";
    escribirForo.style.margin = "";
    publicarPub.style.margin = ""; 
}
const cargarCambiarContrasena = () => {
    MiPerfil.classList.add("miPerfil-off");
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
    sidebar.classList.remove("contenedor-sidebar-OFF");
    contenido_principal.style.width = "";
    contenido_principal.style.marginLeft = "";
    contenido_principal.style.padding = "";
    escribirForo.style.margin = "";
    publicarPub.style.marginLeft = "";
    contenido_principal.style.marginTop = "";
    escribirForo.style.margin = "";
    publicarPub.style.margin = ""; 
}

const cargarMiPerfil = () =>{
    MiPerfil.classList.remove("miPerfil-off");
    foro.classList.add("FORO-OFF"); // se agrega la clase foro off ocultarla
    iniciar_pub.classList.add("iniciarnuevapublicacion-off"); // Se eliminar el boton inicar publicacion
    iniciar_foro.classList.add("iniciarforo-off"); // Se elimina el boton iniciar foro
    document.title = "Mi Perfil"; // Se establece el titulo de la pagina
    publicaciones.classList.add("PUBLICACIONES-OFF"); // Se apagan las publicaciones
    editarPerfil.classList.add("EDITAR-PERFIL-OFF"); // Se encide la vista del editar perfil
    cambiarContrasena.classList.add("CAMBIAR-CONTRASENA-OFF"); // Se apaga el cambiar contraseña
    escribirForo.classList.add("ESCRIBIR-FORO-OFF"); // se agrega la clase para evitar su vista
    publicarPub.classList.add("ESCRIBIR-PUBLICACION-OFF");// se agrega la clase para evitar su vista
    sidebar.classList.add("contenedor-sidebar-OFF");
    contenido_principal.style.width = "100%";  // Modificación del ancho de la seccion al entrar en la vista de perfil
    // remocion de las margenes y paddings en vista mi pefil
    contenido_principal.style.marginLeft = "0%"; 
    contenido_principal.style.padding = "0rem";
    escribirForo.style.margin = "4rem";
    publicarPub.style.margin = "4rem"; 

    if(screen.width < 780){
        contenido_principal.style.marginTop = "8rem";
    }
    if(screen.width < 430){
        escribirForo.style.margin = "2rem";
        publicarPub.style.margin = "2em"; 
    }
}

const botonMisforos = document.getElementById("MisForos");
const botonMisPublis = document.getElementById("MisPublis");
botonMisforos.style.color = "#1A3467";
document.getElementById("MisPublicaciones").style.display = "none";

botonMisforos.addEventListener("click",(event) => {
    botonMisforos.style.color = "#1A3467";
    botonMisPublis.style.color = "#b4afaf";
    document.getElementById("MisForos_contenido").style.display = "";
    document.getElementById("MisPublicaciones").style.display = "none";
    publicarPub.style.display = "none"; 
    escribirForo.style.display = "";
});

botonMisPublis.addEventListener("click", (e)=>{{
    botonMisforos.style.color = "#b4afaf";
    botonMisPublis.style.color = "#1A3467";
    document.getElementById("MisForos_contenido").style.display = "none";
    document.getElementById("MisPublicaciones").style.display = "";
    escribirForo.style.display = "none";
    publicarPub.style.display = ""; 
}})


// ! MODIFICAICION DEL DOM EN LA SECCION MI PEFIL


document.querySelector(".foros").addEventListener("click", (event) => {
    cargarForo(); // Se ejecuta la funcion
});

document.querySelector(".publicaciones").addEventListener("click", (event) => {
    cargarPublicaiones() // Se ejecuta la funcion
});



//! OPTENER LOS VALORES DEL ul - li

const perfil_menu = document.querySelectorAll("#dropdown-perfil li"); // Optenemos del Dropdown Menu todos los hijos

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
        if (this.innerHTML == "Mi perfil"){
            cargarMiPerfil();
        }else if (this.innerHTML === "Editar Perfil") { // En caso de dar clic en editar perfil
            cargarEditarPerfil(); //Carga la funcion editar perfil
        } else if (this.innerHTML === "Cambiar Contraseña") { // En caso de dar clic en cambiar contraseña
            cargarCambiarContrasena(); // Cargar la funcion cambiar contraseña
        } else if (this.innerHTML === "Modo Oscuro") { // En caso de dar clic en modo oscuro  
            alert("Esta función aun no se encuentra habilitada"); //? Pronto la funcion xd
        }
    }
}
// Escribir un nuevo foro
const escribirnuevoforo = () => {
    document.title = "Nuevo foro"// Se agrega el nuevo titulo
    escribirForo.classList.remove("ESCRIBIR-FORO-OFF"); // se remueve la clase para ser mostrado
    foro.classList.add("FORO-OFF");
    escribirForo.style.display = "";
}


//Escribr una nueva publicación 
const escribirnuevapublicacion = () => {
    document.title = "Nuevo Publicación" // Se agrega el nuevo titulo
    publicarPub.classList.remove("ESCRIBIR-PUBLICACION-OFF"); // se remueve la clase para ser mostrado
    publicaciones.classList.add("PUBLICACIONES-OFF");
    publicarPub.style.display = ""; 
}

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

function obtenerIdDeClicPorClase(className) {
    var elementos = document.getElementsByClassName(className);
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].addEventListener('click', function () {
            return this.id
        });
    }
}
