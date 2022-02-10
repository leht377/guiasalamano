<section class="col-xl-10 col-sm-12 p-3 bg-violet-light">
    <div class="informacion_dash w-100">
        <h4 class="mb-3 p-2 text-white fw-bold">Destinos</h4>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly" style="gap:10px;">

        <?php
        foreach ($data["sitios"] as $sitios) {

        ?>
            <a class="card text-decoration-none text-white" style="width: 18rem;" href="index.php?c=clienteDashboard&a=viewguias&id=<?php echo $sitios['id']?>">
                <img src='<?php echo $sitios["img"] ?>' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $sitios["nombre"] ?></h5>
                    <p class="card-text"><?php echo $sitios["descripcion"] ?></p>
                </div>
            </a>

        <?php
        }
        ?>


    </div>
</section>