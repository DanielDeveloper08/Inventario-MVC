<?php require_once 'views/partials/encabezado.php'; ?>
<script>
    const element = document.getElementById("ayuda");
    element.classList.add("div-active");

    const div_actives = document.getElementsByClassName("div-active");

    for (let i = 0; i < div_actives.length; i++) {
        div_actives[i].classList.remove("div-active");
    }
</script>
<div class="row justify-content-center" style="margin-left:350px; background-image: url('assets/iconos/fondo.png'); background-size:auto; height:100vh;" id="ayuda">

    


</div>
<?php require_once 'views/partials/piedepagina.php'; ?>