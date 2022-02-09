<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Hello, world!</title>
  <link rel="stylesheet" href="./assets/css/estilosform.css">


</head>

<body id="container-registro-guia">
  <main class="d-flex align-items-center vh-100">
    <form class="p-4 needs-validation container-xl container-sm  " novalidate autocomplete="off" method="post" id="box-card-guia"> 
      <h1 class="text-center text-white mb-4">Registro de guía</h1>
      <div class="row">
        <div class=" col-sm-12 col-md-4  ">
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control bg-transparent text-white" placeholder="Nombres" id="floatingInput" required>
              <label for="floatingInput" class="text-white">Nombres</label>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 ">
          <div class="form-floating mb-3">
            <input type="text" class="form-control text-white bg-transparent" placeholder="Apellidos" id="floatingInput" required>
            <label for="floatingInput" class="text-white">Apellidos</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class=" col-sm-4 col-md-4">
          <div class="form-floating mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Edad"  id="floatingInput" required>
            <label for="floatingInput" class="text-white">Edad</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-4">
          <div class="form-floating mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Celular"  id="floatingInput" required>
            <label for="floatingInput" class="text-white">Celular</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <div class="form-floating mb-3">
            <input type="email" class="form-control text-white bg-transparent" id="floatingInput" placeholder="Email" required>
            <label for="floatingInput" class="text-white">Email address</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control text-white bg-transparent" placeholder="Direccion" id="floatingInput" required>
            <label for="floatingInput" class="text-white">Direccion</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-xl-6  col-md-6 col-sm-12">
          <div class="form-floating">
            <select class="form-select bg-transparent text-white  mb-3" id="floatingSelect" aria-label="Floating label select example" required>
              <option value="">Seleccionar</option>
              <option class="text-dark" value="1">Cedula</option>
              <option class="text-dark" value="2">Cedula extranjera</option>
              <option class="text-dark" value="3">otra</option>
            </select>
            <label for="floatingSelect" class="text-white">Tipo de documento</label>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12">
          <div class="form-floating mb-3">
            <input type="number" class="form-control text-white bg-transparent" placeholder="Numero"  id="floatingInput" required>
            <label for="floatingInput" class="text-white">Numero del documento</label>
            <div class="invalid-feedback">
              El campo no pueda estar vacio
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating">
            <select class="form-select bg-transparent text-white" id="floatingSelect" aria-label="Floating label select example" required>
              <option value="" >Seleccionar...</option>
              <option class="text-dark" value="1">Masculino</option>
              <option class="text-dark" value="2">Femenino</option>
              <option class="text-dark" value="3">otro</option>
            </select>
            <label for="floatingSelect" class="text-white">Genero</label>
          </div>
        </div>
        <!-- <div class="col-6">
          <div class="mb-3">
            <span class="text-white fw-bold">Foto</span>
            <input class="form-control" type="file" id="formFile">
          </div>
        </div> -->
      </div> 
      <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>
  </main>

  <script src="./assets/js/validateform.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/dc694244d4.js" crossorigin="anonymous"></script>
</body>

</html>