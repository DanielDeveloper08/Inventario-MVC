<?php require_once 'views/partials/encabezado.php'; ?>

<div class="container-fluid mb-2 d-block pantallas" style="margin-left:240px; background-image: url('assets/iconos/fondo.png'); background-size:cover;" id="articulo">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Articulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-2" method="POST" action="index.php?c=articulo&a=agregar">
                        <div class="container">
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Codigo</label>
                                    <input type="number" class="form-control" name="txtCodigo" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Area</label>

                                    <select class="form-select" name="selectArea">
                                        <option>Seleccionar</option>

                                        <?php
                                        foreach ($resultadosArea as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->area; ?>"><?php echo $dato->area; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select" name="selectCategoria">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosCategoria as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->categoria; ?>"><?php echo $dato->categoria; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Fabricante</label>
                                    <select class="form-select" name="selectFabricante">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosFabricante as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->fabricante; ?>"><?php echo $dato->fabricante; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Color</label>
                                    <select class="form-select" name="selectColor">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosColor as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->color; ?>"><?php echo $dato->color; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Año</label>
                                    <select class="form-select" name="selectAnio">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosAnio as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->anio; ?>"><?php echo $dato->anio; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" class="form-control" name="txtModelo" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Serie</label>
                                    <input type="text" class="form-control" name="txtSerie" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Condicion</label>
                                    <select class="form-select" name="selectCondicion">
                                        <option>Seleccionar</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Marca</label>
                                    <input type="text" class="form-control" name="txtMarca" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" name="txtDescripcion" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="selectEstado">
                                        <option value="">Seleccionar</option>
                                        <option value="Bueno">Bueno</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Observación</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtObservacion" rows="1"></textarea>
                                </div>
                            </div>

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


     <!-- Modal Editar -->
     <div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Articulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-2" method="POST" action="index.php?c=articulo&a=editar">
                        <div class="container">
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Codigo</label>
                                    <input type="number" class="form-control" id="txtCodigoEditar" name="txtCodigo"  autofocus required readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Area</label>

                                    <select class="form-select" id="selectAreaEditar" name="selectArea">
                                        <option>Seleccionar</option>

                                        <?php
                                        foreach ($resultadosArea as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->area; ?>"><?php echo $dato->area; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-select" id="selectCategoriaEditar" name="selectCategoria">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosCategoria as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->categoria; ?>"><?php echo $dato->categoria; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Fabricante</label>
                                    <select class="form-select" id="selectFabricanteEditar" name="selectFabricante">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosFabricante as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->fabricante; ?>"><?php echo $dato->fabricante; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Color</label>
                                    <select class="form-select" id="selectColorEditar" name="selectColor">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosColor as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->color; ?>"><?php echo $dato->color; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Año</label>
                                    <select class="form-select" id="selectAnioEditar" name="selectAnio">
                                        <option>Seleccionar</option>
                                        <?php
                                        foreach ($resultadosAnio as $dato) {
                                        ?>
                                            <option value="<?php echo $dato->anio; ?>"><?php echo $dato->anio; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" class="form-control" id="txtModeloEditar" name="txtModelo" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Serie</label>
                                    <input type="text" class="form-control" id="txtSerieEditar" name="txtSerie" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Condicion</label>
                                    <select class="form-select" id="selectCondicionEditar" name="selectCondicion">
                                        <option>Seleccionar</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label class="form-label">Marca</label>
                                    <input type="text" class="form-control" id="txtMarcaEditar" name="txtMarca" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="txtDescripcionEditar" name="txtDescripcion" autofocus required>
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" id="selectEstadoEditar" name="selectEstado">
                                        <option value="">Seleccionar</option>
                                        <option value="Bueno">Bueno</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="exampleFormControlTextarea1" cla    ss="form-label">Observación</label>
                                    <textarea class="form-control" id="txtObservacionEditar" name="txtObservacion" rows="1"></textarea>
                                    <input type="hidden" name="id" id="idCategoriaUpdate">
                                </div>
                            </div>

                        </div>
                        <div class="">
                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cerrar">
                            <input type="submit" class="btn btn-primary" value="Editar">
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
        <div class="col-md-12" style="margin-left:10px;">


            <!-- fin alerta -->
            <div class="card">
                <div class="card-header text-center">
                    Listado de Datos - Articulo
                </div>
                <div class="p-4">
                    <div class="filtro d-flex justify-content-between">
                        <div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botonBuscar" class="btn btn-success" role=" button" data-bs-toggle="button"> <i class="bi bi-plus-circle"></i> Nuevo</a>
                        </div>
                        <form id="frmSearchAnio" class="d-flex justify-content-start" method="POST" action="controllers/ReporteController.php">
                            <select class="form-select" id="selectBuscarAnio" name="selectBuscarAnio">
                                <option>Seleccionar año</option>
                                <?php
                                foreach ($resultadosAnio as $dato) {
                                ?>
                                    <option value="<?php echo $dato->anio; ?>"><?php echo $dato->anio; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div>
                                <button  class="btn btn-primary d-flex" id="articulo" style="margin-left:20px;"  type="submit" name="base" ><i class="bi bi-filetype-pdf pe-2"></i> Reporte</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <table class="table table-hover  table-striped table-bordered  text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Serie</th>
                                <th scope="col">Color</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Condición</th>
                                <th scope="col">Observación</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tblDatosSelect">
                            <?php
                            foreach ($resultadosArticulo as $dato) {
                            ?>
                                <tr>
                                    <td><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->descripcion; ?></td>
                                    <td><?php echo $dato->fabricante; ?></td>
                                    <td><?php echo $dato->modelo; ?></td>
                                    <td><?php echo $dato->serie; ?></td>
                                    <td><?php echo $dato->color; ?></td>
                                    <td><?php echo $dato->area; ?></td>
                                    <td><?php echo $dato->condicion; ?></td>
                                    <td><?php echo $dato->observacion; ?></td>
                                    <td><a class="btn btn-primary" href="#" data-bs-toggle="modal" onclick="inicializarDatosUpdate(<?php echo $dato->id; ?>)" id="inicializacion" data-bs-target="#exampleModalEditar"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="btn btn-danger " href="index.php?c=Articulo&a=eliminar&id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
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
</div>

<script>

    //MOSTRAR MARCO 
    const element = document.getElementById("articulo");
    element.classList.add("div-active");

    const div_actives = document.getElementsByClassName("div-active");

    for (let i = 0; i < div_actives.length; i++) {
        div_actives[i].classList.remove("div-active");
    }
    // FIN MOSTRAR MARCO

    if (document.querySelector("#frmSearchAnio")) {
        let frmSearchAnio = document.querySelector("#frmSearchAnio");

        let selectSearch = document.querySelector("#selectBuscarAnio");
        selectSearch.addEventListener('change', fntselectSearch, true);
    }

    function fntselectSearch() {
       
        fntBuscarRegistrosSelect(obtenerTipo());
    }

    async function fntBuscarRegistrosSelect(tipo) {
        document.querySelector("#tblDatosSelect").innerHTML = "";
       
       /* try {*/
            let formData = new FormData(frmSearchAnio);

            let resp = await fetch("index.php?c=" + tipo + "&a=cargarDatos&op=buscar", {
                method: 'POST',
                mode: "cors",
                cache: 'no-cache',
                body: formData
            });

            const json = await resp.json();

            mostrarBusquedaSelect(json);

      /*  } catch (err) {
            console.log("Ocurrio un error: " + err);
        }*/
    }

    function mostrarBusquedaSelect(json) {
       
        if (json.status) {

            const data = json.data;

            data.forEach((item) => {
                let newtr = document.createElement("tr");
                newtr.id = "row_" + item.id;
                newtr.innerHTML = `
                                            <td>${item.id}</td>
                                            <td>${item.codigo}</td>
                                            <td>${item.descripcion}</td>
                                            <td>${item.fabricante}</td>
                                            <td>${item.modelo}</td>
                                            <td>${item.serie}</td>
                                            <td>${item.color}</td>
                                            <td>${item.area}</td>
                                            <td>${item.condicion}</td>
                                            <td>${item.observacion}</td>
                                           <td><a class="btn btn-primary" onclick="inicializarDatosUpdate(${item.id})" data-bs-toggle="modal" data-bs-target="#exampleModalEditar"><i class="bi bi-pencil-square"></i></a> </td>
                                           <td><a onclick="return confirm('Estas seguro de eliminar?');" class="btn btn-danger " href="index.php?c=Articulo&a=eliminar&id=${item.id}"><i class="bi bi-trash"></i></a></td>       
                                           
                                           `;
                document.querySelector("#tblDatosSelect").appendChild(newtr);

            });
        }
    }

    
    function mostrarDatoEncontrado(json) {
        if (json.status) {
            
            const data = json.data[0];
       
            document.querySelector("#txtCodigoEditar").value = data.codigo;
            document.querySelector("#selectAreaEditar").value = data.area;
            document.querySelector("#selectCategoriaEditar").value = data.categoria;
            document.querySelector("#selectFabricanteEditar").value = data.fabricante;
            document.querySelector("#selectColorEditar").value = data.color;
            document.querySelector("#selectAnioEditar").value = data.anio;
            document.querySelector("#txtModeloEditar").value = data.modelo;
            document.querySelector("#txtSerieEditar").value = data.serie;
            document.querySelector("#selectCondicionEditar").value = data.condicion;
            document.querySelector("#txtMarcaEditar").value = data.marca;
            document.querySelector("#txtDescripcionEditar").value = data.descripcion;
            document.querySelector("#selectEstadoEditar").value = data.estado;
            document.querySelector("#txtObservacionEditar").value = data.observacion;
            


            document.querySelector("#idCategoriaUpdate").value = data.id;
        
        }
    }

    function mensajeRegistrado() {
        swal({
            title: "Registro Exitoso!",
            text: "¡El articulo ha sido registrado correctamente!",
            icon: "success",
        }).then((value) => {
            window.location.replace("index.php?c=Articulo&a=index");
        });;
    }

    function mensajeActualizado() {
        swal({
            title: "Edición Exitosa!",
            text: "¡El articulo ha sido editado correctamente!",
            icon: "success",
        }).then((value) => {
            window.location.replace("index.php?c=Articulo&a=index");
        });;
    }
</script>
<?php require_once 'views/partials/piedepagina.php'; ?>