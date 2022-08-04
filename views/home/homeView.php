<?php require_once 'views/partials/encabezado.php'; ?>

<div class="container-fluid  d-block" id="home" style="margin-left:200px; background-image: url('assets/iconos/fondo.png'); background-size:cover;">
    <div class="text-center mt-4">
        <h3 class="px-5 titulo">Bienvenidos al sistema de Inventario de la I.E.
            N° 22333<br>
            “GRAL JUAN JOSE SALAS BERNALES”</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="box" href="index.php?c=Categoria&a=index">
                <div class="our-services settings">
                    <div class="icon"> <img src="https://i.imgur.com/6NKPrhO.png"> </div>
                    <h4>Categoría</h4>
                    <p><?php echo count($resultadosCategoria); ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="box " href="index.php?c=Area&a=index">
                <div class="our-services speedup">
                    <div class="icon"> <img src="https://i.imgur.com/KMbnpFF.png"> </div>
                    <h4>Área</h4>
                    <p><?php echo count($resultadosArea); ?></p>
                </div>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a class="box" href="index.php?c=Fabricante&a=index">
                <div class="our-services backups">
                    <div class="icon"> <img src="https://i.imgur.com/vdH9LKi.png"> </div>
                    <h4>Fabricante</h4>
                    <p><?php echo count($resultadosFabricante); ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="box pb-3" href="index.php?c=Articulo&a=index">
                <div class="our-services database ">
                    <div class="icon"> <img src="https://i.imgur.com/VzjZw9M.png"> </div>
                    <h4>Artículo</h4>
                    <p><?php echo count($resultadosArticulo); ?></p>
                </div>
            </a>
        </div>
    </div>
</div>

</div>
<?php require_once 'views/partials/piedepagina.php'; ?>