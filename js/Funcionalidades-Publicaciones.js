$(document).ready(function () {
    var elementos = document.getElementsByClassName("comentar-publicacion");
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].addEventListener('click', function () {
            $.ajax({
                url: "../src/Like_Comentario.php",
                type: "POST",
                data: { id: this.id },
                success: function (response) {
                    document.title = "Comentar Publicación";
                    document.getElementById("ContenedorPublis").innerHTML = response;
                    if (screen.width < 1070) {
                        document.getElementById("ContenedorPublis").style.display = "block";
                        document.getElementById("PUBLICACIONES").style.backgroundColor = 'White'
                        document.getElementById("PUBLICACIONES").style.borderRadius = "10px";
                        document.getElementById("nuevapub-btn").style.display = "none"
                        document.getElementById("card-publicaciones").style.marginBottom = "-2rem";
                    } else {
                        document.getElementById("contenido-principal").style.marginLeft = "0%";
                        document.getElementById("contenido-principal").style.marginTop = "7.6%";
                        document.getElementById("contenido-principal").style.width = "100%";
                        document.getElementById("contenedor-sidebar").style.display = "none";
                        document.getElementById("ContenedorPublis").style.display = "flex";
                        document.getElementById("card-publicaciones").style.padding = "1.5rem";
                        document.getElementById("card-publicaciones").style.width = "50%";
                        document.getElementById("card-publicaciones").style.maxWidth = "50%";
                        document.getElementById("PUBLICACIONES").style.backgroundColor = 'White'
                        document.getElementById("PUBLICACIONES").style.borderRadius = "10px";

                    }

                }
            });
        });
    }
});
