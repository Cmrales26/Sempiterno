const iniciar = () => {
    window.location.href = "./Interfaces/Main.html";
}
// ... Funciona para expander iterables a elementos individuales.
const NumCode = [...document.querySelectorAll('input.code-input')] // GENERA UN ARRAY PARA CADA UNA DE LAS POSICIONES DE EL ELEMENTO

NumCode.forEach((Casilla, index) => { // Obtiene la casilla y el indice de cada una de ellas
    Casilla.addEventListener('keydown', (e) => { // Detecta cuando una tecla fue presionada
        if (e.keyCode === 8 && e.target.value === '') NumCode[Math.max(0, index - 1)].focus() // Salta al siguiente key.
    })
    Casilla.addEventListener('input', (e) => {
        const [primero, ...restante] = e.target.value
        e.target.value = primero ?? '' // El primero es undefined cuando encuentra un  ""
        const lastInputBox = index === NumCode.length - 1 // Retorna false hasta que llegue al final 
        const didInsertContent = primero !== undefined // Incierta contenido siempre que el primero sea diferente a indefinido
        if (didInsertContent && !lastInputBox) {
            // Continua con los inputs restantes para la inserción de los datos
            NumCode[index + 1].focus()
            NumCode[index + 1].value = restante.join('')
            NumCode[index + 1].dispatchEvent(new Event('input'))
        }
    })
})
//! SE CREAR UNA FUNCIÓN QUE RECIBE EL EVENTO SUBMIT

function onSubmit(e) {
    e.preventDefault()
    const code = NumCode.map(({ value }) => value).join('') // SE MAPEA LOS DATOS DE LA VARIABLE NUMCODE Y SE JUNTAN CON ESPACIOS EN BLANCO
    alert(code)
    return code;
}

// DOM

const contenedor = document.querySelector(".container");
const olvide_pass = document.querySelector(".olvide-pass");
const ingersarCodigo = document.getElementById("Ingresar-Codigo")
const OlvidarContraseña = document.getElementById("OlvidarContraseña");
const volverlogin = document.querySelector(".volverlogin");
const volverlogin1 = document.querySelector(".volverlogin1");

olvide_pass.addEventListener("click",(event)=>{
    contenedor.classList.add("container-blur");
    OlvidarContraseña.classList.add("OlvidarContraseña-active");
})
volverlogin.addEventListener("click",(event)=>{
    OlvidarContraseña.classList.remove("OlvidarContraseña-active");
    contenedor.classList.remove("container-blur");
})
const eviarcodigo = (e) =>{
    e.preventDefault();
    OlvidarContraseña.classList.remove("OlvidarContraseña-active");
    ingersarCodigo.classList.add("Ingresar-Codigo-active");
}

volverlogin1.addEventListener("click",(event)=>{
    ingersarCodigo.classList.remove("Ingresar-Codigo-active");
    contenedor.classList.remove("container-blur");
})



