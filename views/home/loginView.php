<!-- incluimos  Encabezado -->
<!DOCTYPE html>
<html>

<head>
    <link href="assets/css/styles.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

   
    <link href="assets/css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/iconos/area.png" />
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Inventario</title>


</head>

<body>
    <div class="container-fluid login">
        <div class="row justify-content-center">
            <div class="col-md-4">




                <div class="card my-4">
                    <form class="card-body cardbody-color p-lg-2" action="index.php?c=Sesion&a=autenticar" method="POST">
                        <?php if (isset($errorLogin)) {   ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorLogin; ?>
                            </div>
                        <?php } ?>
                        <div class="text-center">
                            <img src="assets/iconos/logo.png" class="img-fluid profile-image-pic img-thumbnail my-4" width="200px" alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="Usuario" name="user">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="pass">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="index.php?c=Registro&a=index" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>


<!-- incluimos  pie de pagina -->
<?php require_once 'views/partials/piedepagina.php'; ?>