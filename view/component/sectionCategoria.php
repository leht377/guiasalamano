<section class="col-xl-10 col-sm-12 p-3 bg-violet-light">
    <div class="informacion_dash w-100">
        <h4 class="mb-3 p-2 text-white fw-bold">Categorias sitios</h4>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly" style="gap:10px;">

        <?php
        foreach ($data["categoria"] as $categoria) {

        ?>
            <a class="card text-decoration-none text-white" style="width: 18rem;" href="index.php?c=clienteDashboard&a=viewSitios&id=<?php echo $categoria['id']?>">
                <img src='<?php echo $categoria["img"] ?>' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $categoria["nombre"] ?></h5>
                    <p class="card-text"><?php echo $categoria["descripcion"] ?></p>
                </div>
            </a>

        <?php
        }
        ?>


    </div>
</section>