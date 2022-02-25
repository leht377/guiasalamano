<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guias a la mano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca7bc5fd05.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/estilo.css">

</head>

<body class="">
   
    <main class="container-fluid vh-100" id="contenido">

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" id="modal-info-guia">
            <div class="modal-header bg-violet-dark d-flex justify-content-center border-0">
                <h3 class="text-white center">INFORMACIÓN DE GUÍA</h3>
            </div>
            <div class="modal-body py-0 bg-violet-light">
                <div class="row h-100">
                    <div class="col-7 d-flex justify-content-start align-items-center">
                        <div class="bg-violet-dark d-flex w-100 rounded align-items-center overflow-hidden ">
                            <div class="card_info">
                                <div class="img1_info"><img src="static/image/beach-gcc1d81d8c_1920.jpg" alt="">
                                </div>
                                <div class="img2_info"><img src="static/image/girl-gcd6f4fcad_640.jpg" alt="">
                                </div>
                                <div class="main-text_info">
                                    <h2>Person One</h2>
                                    <div>
                                        <p>Calificación</p>
                                        <span class="start"></span>
                                        <span class="start"></span>
                                        <span class="start"></span>
                                        <span class="start"></span>
                                        <span class="start"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-3 h-100 d-flex">
                                <div>
                                    <div class="d-flex">
                                        <span class="text-white fw-bold p-2 ">Nombre completo : </span>
                                        <span class="text-white fw-bold p-2">Carlos Marios</span>

                                    </div>
                                    <div class="d-flex mt-2">
                                        <span class="text-white fw-bold p-2 ">Numero de clientes : </span>
                                        <span class="text-white fw-bold p-2">42</span>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <span class="text-white fw-bold p-2 ">Numero de telefono : </span>
                                        <span class="text-white fw-bold p-2">322000022</span>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <span class="text-white fw-bold p-2">Numero de clientes :</span>
                                        <span class="text-white fw-bold p-2 ">42</span>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <div class="border w-100" style="height:  290px;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-violet-dark d-flex justify-content-start border-0">
                <button class="fw-bold px-3 py-2 border-0 rounded" style="background-color:#FAD318;">Solicitar</button>
                <button class="fw-bold px-3 py-2 border-0 rounded" style="background-color:#FAD318;" data-bs-dismiss="modal">Regresar</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Fin modal -->

<header class="bg-violet-dark row" style="height: 15%;">
    <div class="col-xl-4 col-md-6 d-flex justify-content-xl-start justify-content-center  align-items-center">
        <div class="user-header" onclick="">
            <img src="https://i.pinimg.com/originals/91/32/e2/9132e28672cbbc5ec8c7ed793dd2c20e.jpg" class="img-fluid" alt="User Pic">
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
        <div class="d-xl-block  collapse" id="menuOpciones">
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
                <h4 class="mt-4 mb-4 text-white fw-bold">Guia</h4>
                <ul class=" p-0" id="lista-destinos">
                    <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu active-menu-opcion' role='button'> Clientes solicitando</li>
                    <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu' role='button'> Postular destino</li>
                </ul>
            </div>
            <div class="container">
                <h4 class="mt-4 mb-4 text-white fw-bold">Opciones usuario</h4>
                <ul class="p-0" id="lista-destinos">
                    <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick=""><i class="fas fa-cog"></i><span class="ms-2">Configurar perfil</span></li>
                    <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick="logout()"><i class="fas fa-sign-out-alt"></i><span class="ms-2">Log out</span></li>
                </ul>
            </div>
        </div>
    </aside>
    <section class="col-xl-10 col-sm-12 p-3 bg-violet-light">
        <div class="informacion_dash w-100 d-flex justify-content-between align-items-center px-3 py-2">
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
<script src="./assets/js/dashboard.js"></script>

</body>

</html>