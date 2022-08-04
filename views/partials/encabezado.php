<!-- parte inicial del documento-->
<!DOCTYPE html>
<html>

<head>
    <link href="assets/css/styles.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/iconos/area.png" />
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="assets\css\bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  
    <!-- Bootstrap CSS 
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/styles.css" rel="stylesheet">
   
   
   FONT AWESOME 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/iconos/area.png" />-->
    <title>Inventario</title>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar position-fixed" id="side_nav">
            <div class="header-box px-2 pt-3 pb-2">
                <p class="text-light mb-3 text-center" style="font-size:13px; "><i class="bi bi-person-circle"></i> Bienvenido/a <?php session_start();
                                                                                                                                    echo $_SESSION['nombre']; ?></p>
                <h1 class="fs-2"><span class="bg-white text-dark rounded shadow px-3 me-1">CL</span> <span class="text-white">Inventario</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><img style="width:20px " src="assets/iconos/menu.ico"></button>
            </div>
            <ul class="list-unstyled px-3">
                <li class="navigation home div-active" id="home" data-div_active="home" onclick="activar(this)"><a href="index.php?c=Home&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/menu.ico">Menú</a></li>
                <!-- <li class="navigation admin"     data-div_active="admin" onclick="activar(this)"><a href="#" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/admin.png">Administración</a></li> -->
                <li class="navigation categoria" id="categoria" data-div_active="Categoria" onclick="activar(this)"><a href="index.php?c=Categoria&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/category.png">Categoría</a></li>
                <li class="navigation area" id="area" data-div_active="area" onclick="activar(this)"><a href="index.php?c=Area&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/area.png">Área</a></li>
                <li class="navigation fabricante" id="fabricante" data-div_active="fabricante" onclick="activar(this)"><a href="index.php?c=Fabricante&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/factory.png">Fabricante</a></li>
                <li class="navigation color" id="color" data-div_active="color" onclick="activar(this)"><a href="index.php?c=Color&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/color.png">Color</a></li>
                <li class="navigation anio" id="anio" data-div_active="anio" onclick="activar(this)"><a href="index.php?c=Anio&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/year.png">Año</a></li>
                <li class="navigation articulo" id="articulo" data-div_active="articulo" onclick="activar(this)"><a href="index.php?c=Articulo&a=index" class="text-decoration-none px-3 py-3 d-block"><img style="width:20px; margin-right:10px;" src="assets/iconos/articulo.png">Artículo</a></li>
                <li class="navigation ayuda" id="ayuda" data-bs-target="#exampleModalAyuda" data-bs-toggle="modal"><a href="#" class="text-decoration-none px-3 py-3 d-block text-light"><img style="width:20px; margin-right:10px;" src="assets/iconos/help.png">Ayuda</a></li>
            </ul>
            <a href="index.php?c=Sesion&a=cerrarSesion" class="text-light px-2"><i class="bi bi-box-arrow-right text-light"></i> Cerrar Sesión</a>
            <hr class="h-color mx-1">
        </div>

        <div class="modal fade" id="exampleModalAyuda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ayuda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mt-2">
                            <h5 class=" px-5 py-3 titulo"> Bienvenidos al sistema de Inventario de la I.E.
                                N° 22333<br>
                                “GRAL JUAN JOSE SALAS BERNALES”
                            </h5>
                            <div class="">
                                <h3><i class="bi bi-person-circle"></i> Sobre Mi </i></h3>
                                <img src="assets/iconos/sobremi.jpg" alt="sobre mi" style="width:300px;">
                                <p class="mt-3">Heber Luis Illanes Ticllasuca
                                <p class="mb-3">Estudiante de Ingenieria</p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>