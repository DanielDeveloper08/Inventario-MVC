<?php require_once 'views/partials/encabezado.php'; ?>
<div class="container-fluid mb-2 d-block" style="margin-left:200px; background-image: url('assets/iconos/fondo.png'); background-size:contain;" id="fabricante">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Fabricante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-4" method="POST" action="index.php?c=Fabricante&a=agregar">
                        <div class="mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="number" class="form-control" name="txtCodigo" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text" class="form-control" name="txtFabricante" autofocus required>
                        </div>
                        <div class="">
                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cerrar">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal Editar-->
    <div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Fabricante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-4" method="POST" action="index.php?c=fabricante&a=editar">
                        <div class="mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="number" class="form-control" id="txtCodigoEditar" name="txtCodigo" autofocus required readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text" class="form-control" id="txtFabricanteEditar" name="txtFabricante" autofocus required>
                            <input type="hidden" name="id" id="idCategoriaUpdate">
                        </div>
                        <div class="">
                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cerrar">
                            <input type="submit" class="btn btn-primary" value="Editar" id="buttonEditar">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- ********************************************************************************************    -->


    <div class="text-center mt-2">
        <h3 class="py-3 px-5 titulo">Bienvenidos al sistema de Inventario de la I.E.
            N° 22333<br>
            “GRAL JUAN JOSE SALAS BERNALES”</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">


            <!-- fin alerta -->
            <div class="card">
                <div class="card-header text-center ">
                    Listado de Datos - Fabricante
                </div>
                <div class="p-4">
                    <div class="filtro d-flex justify-content-between">
                        <div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botonBuscar" class="btn btn-success" role=" button" data-bs-toggle="button"> <i class="bi bi-plus-circle"></i> Nuevo</a>
                        </div>
                        <form id="frmSearch" class="d-flex">
                            <input type="text" placeholder="Fabricante" size="" class="form-control" id="txtBuscar" name="txtBuscar">
                            <button id="fabricante" class="btn btn-primary d-flex" style="margin-left:10px;" type="submit" name="base"> <i class="bi bi-search px-1"></i> Buscar</button>
                        </form>
                    </div>
                    <hr>
                    <table class="table align-middle table-hover  table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tblDatos">
                            <?php
                            foreach ($resultados as $dato) {
                            ?>
                                <tr>
                                    <td><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->fabricante; ?></td>
                                    <td><a class="btn btn-primary" href="#" data-bs-toggle="modal" onclick="inicializarDatosUpdate(<?php echo $dato->id; ?>)" id="inicializacion" data-bs-target="#exampleModalEditar"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="btn btn-danger " href="index.php?c=Fabricante&a=eliminar&id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
     //MOSTRAR MARCO
     const element = document.getElementById("fabricante");
    element.classList.add("div-active");

    const div_actives = document.getElementsByClassName("div-active");

    for (let i = 0; i < div_actives.length; i++) {
        div_actives[i].classList.remove("div-active");
    }
    //FIN MOSTRAR MARCO
    function mostrarBusqueda(json) {
        if (json.status) {

            const data = json.data;


            data.forEach((item) => {
                let newtr = document.createElement("tr");
                newtr.id = "row_" + item.id;
                newtr.innerHTML = `<tr>
                                           <td>${item.id}</td>
                                           <td>${item.codigo}</td>
                                           <td>${item.fabricante}</td>
                                           <td><a onclick="return confirm('Estas seguro de eliminar?');" class="btn btn-danger " href="index.php?c=Fabricante&a=eliminar&id=${item.id}"><i class="bi bi-trash"></i></a></td>
                                           </tr>
                                           `;
                document.querySelector("#tblDatos").appendChild(newtr);

            });
        }
    }


    function mostrarDatoEncontrado(json) {
        if (json.status) {
            const data = json.data[0];
            document.querySelector("#txtCodigoEditar").value = data.codigo;
            document.querySelector("#txtFabricanteEditar").value = data.fabricante;
            document.querySelector("#idCategoriaUpdate").value = data.id;
        }
    }

    function mensajeRegistrado() {
        swal({
            title: "Registro Exitoso!",
            text: "¡El fabricante ha sido registrado correctamente!",
            icon: "success",
        }).then((value) => {
            window.location.replace("index.php?c=Fabricante&a=index");
        });;
    }

    function mensajeActualizado() {
        swal({
                title: "Edición Exitosa!",
                text: "¡El fabricante ha sido editado correctamente!",
                icon: "success",
            }).then((value) => {
                window.location.replace("index.php?c=Fabricante&a=index");
            });;
    }


</script>

<?php require_once 'views/partials/piedepagina.php'; ?>