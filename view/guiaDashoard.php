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

        <header class="bg-violet-dark row" style="height: 15%;">
            <div class="col-xl-4 col-md-6 d-flex justify-content-xl-start justify-content-center  align-items-center">
                <div class="user-header" onclick="">
                <?php echo' <img src="'. $_SESSION['foto'].'" class="img-fluid" alt="User Pic">';?>
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
                <div class="d-xl-none w-100 px-3 py-3 d-flex align-items-center">
                    <button class="btn bg-violet-dark" type="button" data-bs-toggle="collapse" data-bs-target="#menuOpciones" aria-expanded="false" aria-controls="menuOpciones">
                        <i class="fas fa-bars text-white"></i>
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
                            <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu active-menu-opcion' role='button' onclick="getClientesSolicitando()" > Clientes solicitando</li>
                            <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu ' role='button' onclick="getClientesAceptados()" > Clientes Aceptados</li>
                            <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu ' role='button' onclick="getContratosFinalizados()" > Contratos Finalizados</li>
                            <li class='list-unstyled p-2 text-white rounded fw-bold  opciones-menu' role='button' id="btnPostular" onclick="getCategorias()"> Postular destino</li>
                        </ul>
                    </div>
                    <div class="container">
                        <h4 class="mt-4 mb-4 text-white fw-bold">Opciones usuario</h4>
                        <ul class="p-0" id="lista-destinos">
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" onclick=""><i class="fas fa-cog"></i><span class="ms-2">Configurar perfil</span></li>
                            <li class="list-unstyled p-2 text-white rounded fw-bold opciones-menu" role="button" id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i><span class="ms-2">Log out</span></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <section class="col-xl-10 col-sm-12 p-3 bg-violet-light min-vh-100">
                <div class="informacion_dash w-100 d-flex justify-content-between align-items-center  py-2">
                    <span id="title-dashboard" class=" text-white fw-bold fs-4"></span>
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
                ?? 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/dashboardGuia.js"></script>

</body>

</html>