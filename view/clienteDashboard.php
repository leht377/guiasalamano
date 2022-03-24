<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guias a la mano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca7bc5fd05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/estilo.css">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
</head>

<body class="">

    <main class="container-fluid vh-100" id="contenido">
        <!-- MODAL -->
        <div id="contenedor_modal">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" id="myModal">
                    <div class="modal-content bg-violet">
                        <div class="modal-header">
                            <h5 class="modal-title text-white fw-bold" id="staticBackdropLabel ">CALIFICAR GUIA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            
                            <div class="col-12 col-xl-4  d-flex justify-content-center ">
                                <div class="card w-100">
                                    <div class="img1">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/La_Bocana_Port.jpg">
                                    </div>
                                    <div class="img2">
                                        <img id="foto_guia_modal" src=''>
                                    </div>
                                    <div class="main-text">
                                        <h2 id="name_guia_modal"></h2>
                                        <p>Precio: <span id="precio_destino_modal"></span></p>
                                        <div>
                                            <p>Calificacion</p>
                                            <div class="d-flex col-12 justify-content-center" style="font-size: 1.5rem;">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8 mt-xl-0 mt-sm-4">
                                <header class="w-100" style="height: 170px;">
                                    <img class="h-100 rounded" style="object-fit: cover; width: 100%;" id="foto_destino_modal" src="">
                                </header>
                                <section class="row">
                                    <h4 class="text-white mt-2">Informacion del destino</h4>
                                    <div class="col-12 col-xl-6">
                                        <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                                            <span class="input-group-text text-white bg-transparent fw-bold border-0 " id="inputGroup-sizing-sm">Destino visitado</span>
                                            <input readonly type="text" class="form-control bg-transparent text-white border-0" id="destino_modal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6 ">
                                        <div class="input-group input-group-sm bg-violet-dark bg-violet-dark rounded p-1">
                                            <span class="input-group-text text-white bg-transparent fw-bold border-0 " id="inputGroup-sizing-sm">Fecha</span>
                                            <input readonly type="text" class="form-control bg-transparent text-white border-0" id="fecha_destino_modal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                    <input type="hidden" id="id_guia_modal" value="">
                                    <input type="hidden" id="id_contraro_modal" value="">
                                    <h4 class="text-white mt-sm-2 mt-xl-0">Calificar al guia</h4>
                                    <div class="d-flex col-12" style="font-size: 2rem;">
                                        <span id="start5" onclick="calificar(5)" class="order-5 estrella"><i class="fa-solid fa-star" style="cursor:pointer"></i></span>
                                        <span id="start4" onclick="calificar(4)" class="order-4 estrella"><i class="fa-solid fa-star" style="cursor:pointer"></i></span>
                                        <span id="start3" onclick="calificar(3)" class="order-3 estrella"><i class="fa-solid fa-star" style="cursor:pointer"></i></span>
                                        <span id="start2" onclick="calificar(2)" class="order-2 estrella"><i class="fa-solid fa-star" style="cursor:pointer"></i></span>
                                        <span id="start1" onclick="calificar(1)" class="order-1 estrella startActive"><i class="fa-solid fa-star" style="cursor:pointer"></i></span>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="py-2 border-0 rounded fw-bold btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="py-2 btn-yellow" onclick="enviarCalificacion()">Enviar calificacion</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <header class="bg-violet-dark row" style="height: 15%;">
            <div class="col-xl-4 col-md-6 d-flex justify-content-xl-start justify-content-center  align-items-center">
                <div class="user-header" onclick="getCategorias()">
                    <?php echo ' <img src="' . $_SESSION['foto'] . '" class="img-fluid" alt="User Pic">'; ?>
                </div>
                <h6 class="mx-3 mt-2 text-white fw-bold"><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?> </h6>
            </div>
            <div class="col-xl-4 col-md-6 d-flex justify-content-center align-items-center ps-2 ">
                <h3 class="text-white fw-bold">GUIAS A LA MANO</h3>
            </div>
            <div class="col-xl-4 d-none d-xl-flex justify-content-end align-items-center">
                <div class="input-group rounded w-75">
                    <form action="" class="d-flex w-100">
                        <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0 bg-transparent" id="search-addon">
                            <i class="fas fa-search text-white"></i>
                        </span>
                    </form>
                </div>
            </div>
        </header>

        <main class="row" style="min-height:90%" ;>
            <aside class="col-xl-2 col-sm-12 p-0 bg-violet-light sticky-top">
                <div class="d-xl-none w-100 px-4 py-3 d-flex align-items-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#menuOpciones" aria-expanded="false" aria-controls="menuOpciones">
                        <i class="fas fa-bars"></i>
                    </button>
                    <span class="ms-4 fs-5 fw-bold text-white">Opciones</span>
                </div>
                <div class="d-xl-block collapse" id="menuOpciones">
                    <div class="container d-xl-none d-md-flex justify-content-end py-2 align-items-center ">
                        <div class="input-group rounded">
                            <form action="" class="d-flex w-100">
                                <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0 bg-transparent" id="search-addon">
                                    <i class="fas fa-search text-white"></i>
                                </span>
                            </form>
                        </div>
                    </div>
                    <div class="container">
                        <h4 class="mt-4 mb-4 text-white fw-bold">Destinos Famosos</h4>
                        <ul class="s p-0" id="lista-destinos">
                            <?php
                            foreach ($dataRank["sitios_famosos"] as $sitios) {
                                // echo "<option class ='text-dark' value=" . $dato["id"] . ">" . $dato["nombre"] . "</option>";
                                echo "<li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu' role='button' onclick = 'getGuias(" . $sitios["id"] . ",null)' >" . $sitios["nombre"] . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="container">
                        <h4 class="mt-4 mb-4 text-white fw-bold">Opciones usuario</h4>
                        <ul class="p-0" id="lista-destinos">
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button"><i class="fa-solid fa-file-contract"></i><span class="ms-2">Guia contratado</span></li>
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick="getGuiasparaCalificar()"><i class="fa-solid fa-star"></i><span class="ms-2">Calificar guia</span></li>
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick="showConfingProfile(<?php echo $_SESSION['id']; ?>)"><i class="fas fa-cog"></i><span class="ms-2">Configurar perfil</span></li>
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick="logout()"><i class="fas fa-sign-out-alt"></i><span class="ms-2">Log out</span></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <section class="col-xl-10 col-sm-12 p-3 bg-violet-light min-vh-100 ">
                <div class="informacion_dash w-100 d-flex justify-content-between align-items-center  py-2">
                    <span id="title-dashboard" class="p-2 text-white fw-bold fs-4"></span>
                </div>

                <div class="d-flex flex-wrap justify-content-around align-items-center" id="contenidoDash" style="gap:10px;">

                </div>

            </section>
        </main>
        <footer class="bg-violet-dark row text-center" style="min-height: 100px">
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->

                <!-- Section: Form -->
                <section class="">
                    <form action="">
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong class="text-white">Sign up for our newsletter</strong>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="form5Example21" class="form-control" />
                                    <label class="form-label text-white" for="form5Example21">Email address</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-auto">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Subscribe
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Section: Form -->

                <!-- Section: Text -->
                <section class="mb-4">
                    <p class="text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                        eum harum corrupti dicta, aliquam sequi voluptate quas.
                    </p>
                </section>
                <!-- Section: Text -->

            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/app.js"></script>

</body>

</html>