<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/login.css">
    <link rel="shortcut icon" href="./img/Imagotipo.svg" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Iniciar Sesión</title>
</head>

<body>
    <section id="Login">
        <div class="container mb-3 position-absolute top-50 start-50 translate-middle">
            <div class="row row1">
                <div class="logo">
                    <img src="./img/Logo.svg" alt="" width="50%">
                </div>
                <div class="imagen">
                    <img src="./img/index/Reading-e-book-V2.svg" alt="">
                </div>
            </div>
            <div class="row row2">
                <?php
                include "./src/Conexion.php";
                include "./src/iniciarSesion.php";
                ?>

                <form method="post" action="index.php">
                    <div class="formulario">
                        <div class="mb-3">
                            <label for="indentificacion" class="form-label">Identificación</label>
                            <input type="number" class="form-control id" id="identificacion" name="Identificacion"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="Contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control pass" id="Contraseña" name="Contraseña" required>
                        </div>
                    </div>
                    <div class="olvide-pass">
                        <p>Olvidé mi Contraseña</p>
                    </div>
                    <div class="botones">
                        <div class="iniciar">
                            <input type="submit" value="Ingresar" class="ingresar" name="ingresar">
                        </div>
                        <div class="invitado">
                            <input type="button" value="Entrar Como invitado" class="e-invitado">
                        </div>
                    </div>
                    <div class="crear-cuenta">
                        <p>¿No tienes una cuenta? <a href="./Interfaces/crearcuenta.php">Crea Una</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="OlvidarContraseña">
        <div class="container-recuperar position-absolute top-50 left-50 start-50 translate-middle">
            <div class="contexto">
                <div class="volverlogin">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <h3>Recuperar Contraseña</h3>
                <p>Ingrese su número de teléfono, recibirá un código de 4 dígitos para verificar su identidad y
                    restablecer
                    su contraseña. Siga las instrucciones en pantalla para completar el proceso. Esto asegura que solo
                    usted
                    tenga acceso a su cuenta.</p>
            </div>
            <div class="IngresarTel">
                <h6>Ingrese su número de teléfono</h6>
                <form onsubmit="eviarcodigo(event)">
                    <input type="number" class="form-control" id="TelCode" placeholder="Celular" required>
                    <input type="submit" value="Enviar Código" class="s-code">
                </form>
            </div>
        </div>
    </section>
    <section id="Ingresar-Codigo">
        <div class="container-recuperar position-absolute top-50 left-50 start-50 translate-middle">
            <div class="volverlogin volverlogin1">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="codigo">
                <form onsubmit="onSubmit(event)">
                    <fieldset class='number-code'>
                        <legend>INGRESE EL CÓDIGO DE SEGURIDAD </legend>
                        <p>Usted ha recibido un mensaje de texto con el código de verificación</p>
                        <div>
                            <input type="number" name='code' class='code-input' required /> -
                            <input type="number" name='code' class='code-input' required /> -
                            <input type="number" name='code' class='code-input' required /> -
                            <input type="number" name='code' class='code-input' required />
                        </div>
                    </fieldset>
                    <div class="botoncoddigo">
                        <input type="submit" value="Enviar Código" id="Enviar_codigo">
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script src="./js/login.js"></script>
</body>

</html>