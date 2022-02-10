<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/estilosform.css">


</head>

<body id="container-registro-cliente">
  <main class="d-flex justify-content-center align-items-center vh-100 contenedo-formulario-registro">
    <form class="container-sm container-md  p-5 needs-validation" novalidate action="index.php?c=registro&a=registrarCliente" method="post" id="box-card-registrouser" autocomplete="off" style="width: 800px;">
      <h1 class="text-white mb-2 text-center mb-4">Registro de clientes</h1>
      <section class="row">

        <div class="col-sm-6 col-md-4">
          <div class="form-floating-sm mb-3 ">
            <input type="text" class="form-control bg-transparent text-white" placeholder="Nombres" id="nombres_cli" name="nombres_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-floating-sm mb-3 ">
            <input type="text" class="form-control bg-transparent text-white" placeholder="Apellidos" id="apellidos_cli" name="apellidos_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4  mb-3">
          <select class="form-select form-select bg-transparent text-white" aria-label=".form-select-sm example" id="tDocumento_cli" name="tDocumento_cli" required>
            <option class="text-dark" value="">Tipo documento</option>
            <?php
            foreach ($data_tipoducumento["tipo_documento"] as $dato) {
              echo "<option class ='text-dark' value=" . $dato["id"] . ">" . $dato["nombre"] . "</option>";
            }
            ?>
          </select>
          <div class="invalid-feedback">
            Seleccione una opcion
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-floating-sm mb-3 ">
            <input type="number" class="form-control bg-transparent text-white" placeholder="Cedula" id="cedula_cli" name="cedula_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-floating-sm mb-3 ">
            <input type="number" class="form-control bg-transparent text-white" placeholder="Celular" id="celular_cli" name="celular_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-floating-sm mb-3 ">
            <input type="number" class="form-control bg-transparent text-white" placeholder="Edad" id="edad_cli" name="edad_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-floating-sm mb-3 ">
            <input type="email" class="form-control bg-transparent text-white" placeholder="Email" id="email_cli" name="email_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="form-floating-sm mb-3 ">
            <input type="text" class="form-control bg-transparent text-white" placeholder="Usuario" id="usuario_cli" name="usuario_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-floating-sm mb-3 position-relative ">
            <input type="password" class="form-control bg-transparent text-white" placeholder="Contraseña" id="password_cli" name="password_cli" required>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
            <div class="fas fa-eye position-absolute text-white position-icon-left" role="button" id="btn-show-password" onclick="showPassword('password_cli')" style="z-index: 99;"></div>
          </div>
        </div>

        <div class="col-sm-12">
          <select class="form-select form-select bg-transparent text-white" aria-label=".form-select-sm example" name="procedencia" required>
            <option class="text-dark" value="">Procedencia</option>
            <?php
            foreach ($data_procedencia["procedencia"] as $dato) {
              echo "<option class ='text-dark' value=" . $dato["id"] . ">" . $dato["nombre"] . "</option>";
            }
            ?>
          </select>
          <div class="invalid-feedback">
            Seleccione una opcion
          </div>
        </div>

      </section>
      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label text-white" for="flexCheckDefault">
          Aceptar terminos y condiciones
        </label>
      </div>
      <a href="index.php?c=registroguia" class="d-block ">Registrarce como guia</a>
      <button type="submit" class="btn btn-primary mt-4 ml-auto ms-auto">Registrar</button>
    </form>
  </main>
  <script src="./assets/js/validateform.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/dc694244d4.js" crossorigin="anonymous"></script>



</body>

</html>