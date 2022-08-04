<!-- parte final del documento-->
<div class="container-fluid pie-pagina position-fixed bottom-0 d-flex justify-content-center">
    I.E. N° 22333 “Gral Juan José Salas Bernales” - @2022
</div>


<script>
    if (document.querySelector("#frmSearch")) {

        let frmSearch = document.querySelector("#frmSearch");

        frmSearch.onsubmit = function(e) {
            e.preventDefault();
        }

        /*FILTRO DE CADA PANTALLA*/
        let inputSearch = document.querySelector("#txtBuscar");
        inputSearch.addEventListener("keyup", fntInputSearch, true);

        async function fntBuscarRegistros(tipo) {
            document.querySelector("#tblDatos").innerHTML = "";
            try {
                let formData = new FormData(frmSearch);

                let resp = await fetch("index.php?c=" + tipo + "&a=cargarDatos&op=buscar", {
                    method: 'POST',
                    mode: "cors",
                    cache: 'no-cache',
                    body: formData
                });

                const json = await resp.json();

                mostrarBusqueda(json);

            } catch (err) {
                console.log("Ocurrio un error: " + err);
            }
        }

        function fntInputSearch() {
            fntBuscarRegistros(obtenerTipo());
        }
    }

    function obtenerTipo() {
        const moment = document.getElementsByName("base");
        const tipo = moment[0].getAttribute("id");
        return tipo;
    }



    function inicializarDatosUpdate(id) {
        inicializarDatos(id);
    }

    async function inicializarDatos(id) {
       
        try {
            let resp = await fetch("index.php?c=" + obtenerTipo() + "&a=inicializar&id=" + id, {
                method: 'GET',
                mode: "cors",
                cache: 'no-cache',
            });

            const json = await resp.json();
            mostrarDatoEncontrado(json);

          

        } catch (err) {
            console.log("Ocurrio un error: " + err);
        }
    }
</script>


<!-- Bootstrap JS -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets\js\bootstrap.js"></script>
<script src="assets\js\bootstrap.esm.js"></script>
<script src="assets\js\bootstrap.bundle.js"></script>
</body>

</html>