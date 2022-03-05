<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilosform.css">
    <script src="https://kit.fontawesome.com/ca7bc5fd05.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body id="container-login"> 

    <!-- <div class="modal fade" id="lapandora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div> -->

    <div class="container ">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="container-sm container-md p-5 rounded shadow" id="box-card"  style="width: 500px; min-height: 400px;">
                <h1 class="text-center mb-5 text-white">Iniciar sesion</h1>

                <form action="index.php?c=login&a=validarCredenciales" method="POST" class = "needs-validation " novalidate id="form_login" autocomplete="off">
                    <div class="input-group mb-4 position-relative">
                        <input type="text" id="usernamelogin" class="form-control bg-transparent text-white fw-bold  ps-5" placeholder="Username" aria-label="Username"
                            required name="user">
                        <div class="invalid-feedback">
                          El campo no pueda estar vacio
                        </div>
                        <i class="fas fa-user-tie position-absolute text-white position-icon-right" ></i>    
                    </div>
                    <div class="input-group mb-4 position-relative">
                        <input type="password" id="passwordlogin" name="password" required class="form-control bg-transparent text-white fw-bold ps-5" placeholder="Password"
                            aria-describedby="basic-addon1">
                        <div class="invalid-feedback">
                            El campo no pueda estar vacio
                        </div>    
                        <div class="fas fa-eye position-absolute text-white position-icon-right" role="button" id="btn-show-password" onclick="showPassword('passwordlogin')" style="z-index: 99;"></div>
                    </div>
                    <div class="my-3">
                        <span class="text-white">No tienes cuenta?  <a href="index.php?c=registro">Registrarte</a></span>
                    </div>
                    <div class="my-4 d-grid">
                        <button type="submit" class="btn btn-primary fw-bold">Iniciar sesion</button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/jquery.js"></script>  
    <script src="./assets/js/login.js"></script>
    <script src="./assets/js/validateform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>