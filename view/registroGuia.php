<!doctype html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca7bc5fd05.js" crossorigin="anonymous"></script>
  <title>Hello, world!</title>
  <link rel="stylesheet" href="./assets/css/estilosform.css">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">

</head>

<body id="container-registro-guia">
  <main class="d-flex align-items-center vh-100">

    <form class="px-3 py-4 needs-validation container-sm container-md rounded" action="index.php?c=registroguia&a=registrasGuia" novalidate autocomplete="off" method="post" id="box-card-guia" enctype="multipart/form-data" style="width: 800px" ;>
      <h1 class="text-center text-white mb-4">Registro de guía</h1>
      <section class="row">
        <div class="col-6 col-sm-12 col-md-4  ">
          <div class="form-floating-sm mb-3 ">
            <input type="text" class="form-control bg-transparent text-white" placeholder="Nombres" name="nombres_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-12 col-md-4 ">
          <div class="form-floating-sm mb-3">
            <input type="text" class="form-control text-white bg-transparent" placeholder="Apellidos" name="apellidos_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-4 col-md-4">
          <div class="form-floating-sm mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Edad" name="edad_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-8 col-md-4">
          <div class="form-floating-sm mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Celular" name="celular_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <div class="form-floating-sm mb-3">
            <input type="email" class="form-control text-white bg-transparent" placeholder="Email" name="email_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating-sm mb-3">
            <input type="text" class="form-control text-white bg-transparent" placeholder="Direccion" name="direccion_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-6  col-md-6 col-sm-12">
          <div class="form-floating-sm">
            <select class="form-select bg-transparent text-white  mb-3" aria-label="Floating label select example" name="tipodocumento_guia" required>
              <option value="">Tipo de documento</option>
              <?php
              foreach ($data["tipo_documento"] as $dato) {
                echo "<option class ='text-dark' value=" . $dato["id"] . ">" . $dato["nombre"] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-6 col-xl-6 col-md-6 col-sm-12">
          <div class="form-floating-sm mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Cedula" name="documento_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-6 col-md-12 col-sm-12">
          <div class="form-floating-sm mb-3">
            <select class="form-select bg-transparent text-white" aria-label="Floating label select example" name="genero_guia" required>
              <option value="">Genero...</option>
              <option class="text-dark" value="1">Masculino</option>
              <option class="text-dark" value="2">Femenino</option>
              <option class="text-dark" value="3">otro</option>
            </select>
          </div>
        </div>
<!-- 
        <div class="col-6 col-sm-12 col-md-6 ">
          <div class="mb-3">
            <input class="form-control form-control" id="formFileSm" type="file" name="file"> 
          </div>
        </div> -->

        <div class="col-6 col-xl-6 col-md-6 col-sm-12">
          <div class="form-floating-sm mb-3">
            <input type="text" class="form-control text-white bg-transparent" placeholder="Usuario" name="usuario_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class=" col-12 col-md-12 col-sm-12 col-xl-6">
          <div class="form-floating-sm mb-3 position-relative ">
            <input type="password" class="form-control bg-transparent text-white" placeholder="Contraseña" id="password_guia" name="password_guia" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
            <div class="fas fa-eye position-absolute text-white position-icon-left" role="button" id="btn-show-password" onclick="showPassword('password_guia')" style="z-index: 99;"></div>
          </div>
        </div>



      </section>
      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label text-white" for="flexCheckDefault">
          Aceptar terminos y condiciones
        </label>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>
  </main>

  <script src="./assets/js/jquery.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./assets/js/validateform.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>