$(document).ready(function () {
    var elementos = document.getElementsByClassName("card-foro");
    // console.log(elementos);
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].addEventListener('click', function () {
            $.ajax({
                url: "../src/ComentarioForo.php",
                type: "POST",
                data: { id: this.id },
                success: function (response) {
                    document.getElementById("ContenedorForos").innerHTML = response;
                }
            });
        });
    }
});
