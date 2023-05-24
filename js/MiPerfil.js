const botonMisforos = document.getElementById("MisForos");
const botonMisPublis = document.getElementById("MisPublis");
botonMisforos.style.color = "#1A3467";
document.getElementById("MisPublicaciones").style.display = "none";

botonMisforos.addEventListener("click", (event) => {
    botonMisforos.style.color = "#1A3467";
    botonMisPublis.style.color = "#b4afaf";
    document.getElementById("MisForos_contenido").style.display = "";
    document.getElementById("MisPublicaciones").style.display = "none";
    publicarPub.style.display = "none";
    escribirForo.style.display = "";
});

botonMisPublis.addEventListener("click", (e) => {
    {
        botonMisforos.style.color = "#b4afaf";
        botonMisPublis.style.color = "#1A3467";
        document.getElementById("MisForos_contenido").style.display = "none";
        document.getElementById("MisPublicaciones").style.display = "";
    }
})



