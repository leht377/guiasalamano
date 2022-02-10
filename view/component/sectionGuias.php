<section class="col-xl-10 col-sm-12 p-3 bg-violet-light">
    <div class="informacion_dash w-100">
        <h4 class="mb-3 p-2 text-white fw-bold">Guias postulados</h4>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly" style="gap:10px;">

        <?php
        foreach ($data["guias"] as $guia) {

        ?>
                <a class="row text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img1"><img src="https://upload.wikimedia.org/wikipedia/commons/5/53/La_Bocana_Port.jpg" alt="" srcset="">
                            </div>
                            <div class="img2"><img src='<?php echo $guia["foto"] ?>' >
                            </div>
                            <div class="main-text">
                                <h2><?php echo $guia["nombres"] ?></h2>
                                <p>Precio: xxxxx</p>
                                <p>Distancia: xxxxxx</p>
                                <div>
                                    <p>Calificacion</p>
                                    <span class="start"></span>
                                    <span class="start"></span>
                                    <span class="start"></span>
                                    <span class="start"></span>
                                    <span class="start"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            

        <?php
        }
        ?>


    </div>