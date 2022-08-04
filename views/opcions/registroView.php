<!-- incluimos  Encabezado -->
<!DOCTYPE html>
<html>

<head>
    <link href="assets/css/styles.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

    <link rel="shortcut icon" href="assets/iconos/area.png" />
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="assets/css/stylesRegistro.css" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Inventario</title>


</head>

<body>
    <div class="container" id="registration-form">
        <div class="image">
            <img src="" alt="" id="">
        </div>
        <div class="frm">
            <h2 class="">Registro de Usuario</h2>
            <form action="index.php?c=Registro&a=agregar" method="POST">
                <div class="form-group">
                    <label for="username">Nombres:</label>
                    <input type="text" class="form-control" id="username" name="txtNombres" placeholder="Ingrese sus nombres">
                </div>
                <div class="form-group">
                    <label for="email">Usuario:</label>
                    <input type="text" class="form-control" id="email" name="txtUsuario" placeholder="Ingrese un nombre de usuario">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="txtPassword" placeholder="Ingresa su contraseña">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success ">Registrar</button>
                    <div class="return-login py-4 text-center">
                        Already have a account? <a href="index.php?c=Login&a=index" class="text-dark fw-bold"> Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    
    function mensajeRegistrado() {
        swal({
            title: "Registro Exitoso!",
            text: "¡El usuario ha sido registrado correctamente!",
            icon: "success",
        }).then((value) => {
            window.location.replace("index.php?c=Registro&a=index");
        });;
    }
</script>

<!-- incluimos  pie de pagina -->
<?php require_once 'views/partials/piedepagina.php'; ?>