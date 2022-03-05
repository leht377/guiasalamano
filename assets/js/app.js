$(document).ready(function () {
  const opciones_menu = document.querySelectorAll(".opciones-menu");
  opciones_menu.forEach((opciones) => {
    opciones.addEventListener("click", () => {
      opciones_menu.forEach((item) => {
        item.classList.remove("active-menu-opcion");
      });
      opciones.classList.add("active-menu-opcion");
    });
  });

  // ("use strict");

  // (function (document, window, index) {
  //   var inputs = document.querySelectorAll(".inputfile");
  //   Array.prototype.forEach.call(inputs, function (input) {
  //     var label = input.nextElementSibling,
  //       labelVal = label.innerHTML;

  //     input.addEventListener("change", function (e) {
  //       var fileName = "";
  //       if (this.files && this.files.length > 1)
  //         fileName = (this.getAttribute("data-multiple-caption") || "").replace(
  //           "{count}",
  //           this.files.length
  //         );
  //       else fileName = e.target.value.split("\\").pop();

  //       if (fileName) label.querySelector("span").innerHTML = fileName;
  //       else label.innerHTML = labelVal;
  //     });
  //   });
  // })(document, window, 0);

  getCategorias();
});
function enviarFormSolicitarguia(){
  document.getElementById("btnsolicitarcliente").click();
}

function getCategorias() {
  $.ajax({
    type: "GET",
    url: "index.php?c=clienteDashboard&a=viewCategorias",

    beforeSend: function () {
      template = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            
            `;
      $("#contenidoDash").html(template);
    },
    success: function (response) {
      template = "";
      var resultado = JSON.parse(response);
      resultado.forEach((categoria) => {
        template += `
                <div href = "#/sitios" class="card text-decoration-none text-white" style="width: 18rem;" role="button" onclick="getSitios(${categoria.id})">
                    <img src='${categoria.img}' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">${categoria.nombre}</h5>
                        <p class="card-text">${categoria.descripcion}</p>
                    </div>
                </div>
                `;
      });
      document.getElementById("title-dashboard").textContent = "Categorias";
      //   $("#title-dashboard").text = "Catergorias";
      $("#contenidoDash").html(template);
    },
  });
}

function getSitios(id) {
  $.ajax({
    type: "GET",
    url: "index.php?c=clienteDashboard&a=viewSitios&id=" + id,
    beforeSend: function () {
      template = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            
            `;
      $("#contenidoDash").html(template);
    },
    success: function (response) {
      template = "";
      var resultado = JSON.parse(response);
      resultado.forEach((sitios) => {
        template += `
                    <a href ="#" class="card text-decoration-none text-white" style="width: 18rem;" onclick="getGuias(${sitios.id},'${sitios.nombre}')">
                        <img src='${sitios.img}' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title">${sitios.nombre}</h5>
                            <p class="card-text">${sitios.descripcion}</p>
                        </div>
                    </a>
                `;
      });
      document.getElementById("title-dashboard").textContent = "Sitios";
      $("#contenidoDash").html(template);
    },
  });
}
function sendInformationContratacion(id_sitio, id_guia){
  $("#formsolicitarguia").submit(function (ev) {
    let fecha_solicitud = document.getElementById("fecha_solicitud").value;
    let hora_solicitud = document.getElementById("hora_solicitud").value;
    $.ajax({
      type: "POST",
      url: $("#formsolicitarguia").attr("action"),
      data: {"hora_solicitud":hora_solicitud,"fecha_solicitud":fecha_solicitud,"id_sitio": id_sitio,"id_guia": id_guia},
      beforeSend: function () {
        Swal.fire({
          icon: "success",
          title: "Solicitar guia",
          text: "Se han solicitado el guia satisfactoriamente espere a que confirme su solicito!",
          color: "white",
          background: "#4618AC",
          showConfirmButton: false,
          timer: 3000,
        });
      },
      success: function (res) {
        console.log(res);
        if(res == 1){
          Swal.fire({
            icon: "success",
            title: "Solicitar guia",
            text: "Se han solicitado el guia satisfactoriamente espere a que confirme su solicito!",
            color: "white",
            background: "#4618AC",
            showConfirmButton: false,
            timer: 3000,
          });
        }else{
          Swal.fire({
            icon: "error",
            title: "Solicitar guia",
            text: "No Se han podido solicitar el guia",
            color: "white",
            background: "#4618AC",
            iconColor: "white",
            showConfirmButton: false,
            timer: 3000,
          });
        }
      },
    });
    ev.preventDefault();
  });
}

function showContratarguia(id_sitio,id_guia) {
  $.ajax({
    type: "POST",
    url: "index.php?c=clienteDashboard&a=getinformacionContratacionguia",
    data: {"id_sitio":id_sitio, "id_guia":id_guia},
    beforeSend: function () {
      template = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            
            `;
      $("#contenidoDash").html(template);
    },
    success: function (response) {
      var resultado = JSON.parse(response);
      console.log(resultado);
      template = `
    <div class="row container-fluid p-2 py-3 rounded">
                            <div class="container col-12 col-sm-12 col-xl-3 d-flex flex-column justify-content-start ">
                                <div class="card w-100">
                                    <div class="img1"><img src="https://upload.wikimedia.org/wikipedia/commons/5/53/La_Bocana_Port.jpg" >
                                    </div>
                                    <div class="img2"><img src='${resultado[0].foto_guia}' >
                                    </div>
                                    <div class="main-text">
                                        <h2></h2>
                                        <p>Nombre: ${resultado[0].nombre_guia} </p>
                                        <p>Precio: ${resultado[1].precio} </p>
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
                                <div class="mt-3">
                                    <button class="btn bg-yellow text-dark fw-bold d-block w-100" id="solicitarGuia" onclick="enviarFormSolicitarguia()" >Solicitar</button>
                                    <button class="btn bg-yellow text-dark fw-bold mt-2 d-block w-100" >Cancelar</button>
                                </div>
                                
                            </div>
                            <div class="col-12 col-xl-9 mt-3 mt-xl-0 ">
                                <header class="w-100" style="height: 200px;">
                                    <img class="w-100 h-100 rounded" style="object-fit: cover;" src="${resultado[1].img}" >
                                </header>
                                <section class=" mt-4 p-2">
                                    <form action="index.php?c=clienteDashboard&a=solcitarguia" metod= "post" class="row" id="formsolicitarguia">
                                        <h3 class="fw-bold text-white">Informacion del Guia</h3>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm">Nombres</span>
                                                <input type="text" class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[0].nombre_guia}">
                                              </div>
                                              
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm">Apellidos</span>
                                                <input type="text" class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[0].apellido_guia}">
                                              </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm">Destino</span>
                                                <input type="text" class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[1].nombre}">
                                              </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm">Precio</span>
                                                <input type="number" class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[1].precio}">
                                              </div>
                                        </div>
                                        <h3 class="fw-bold text-white">Seleccionar horario </h3>
                                        <div class="col-12 col-xl-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm ">Fecha de contratacion</span>
                                                <input type="date" name="fecha_solicitud"  id="fecha_solicitud" required class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                              </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text text-white bg-transparent fw-bold" id="inputGroup-sizing-sm">Hora de contratacion</span>
                                                <input type="time" name="hora_solicitud" id="hora_solicitud" required class="form-control bg-transparent text-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                              </div>
                                        </div>
                                        <button type="submit" id="btnsolicitarcliente" hidden></button>
                                    </form>
                                </section>
                            </div>                      
                    </div>
  
  
       `;
      document.getElementById("title-dashboard").textContent = "Contratar Guia";
      $("#contenidoDash").html(template);
      sendInformationContratacion(id_sitio,id_guia);
    },
  });
}

function getGuias(id, nombre) {
  console.log(nombre);
  $.ajax({
    type: "GET",
    url: "index.php?c=clienteDashboard&a=viewguias&id=" + id,
    beforeSend: function () {
      template = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            
            `;
      $("#contenidoDash").html(template);
    },
    success: function (response) {
      template = "";
      var resultado = JSON.parse(response);
      resultado.forEach((Guias) => {
        template += `
                <div class="row text-decoration-none text-white" onclick="showContratarguia(${id},'${Guias.id}')">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img1"><img src="https://upload.wikimedia.org/wikipedia/commons/5/53/La_Bocana_Port.jpg" >
                            </div>
                            <div class="img2"><img src='${Guias.foto}' >
                            </div>
                            <div class="main-text">
                                <h2>${Guias.nombres}</h2>
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
                </div>
                `;
      });
      document.getElementById("title-dashboard").textContent =
        "Guias postulados " + nombre;
      $("#contenidoDash").html(template);
    },
  });
}

function showConfingProfile(id) {
  $.ajax({
    type: "GET",
    url: "index.php?c=clienteDashboard&a=getInformationFormUser&id=" + id,
    beforeSend: function () {
      template = `
              <div class="spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
              </div>
              
              `;
      $("#contenidoDash").html(template);
    },
    success: function (response) {
      template = "";
      var resultado = JSON.parse(response);

      resultado.forEach((resultado) => {
        console.log(resultado);
        template = ` 
        <form action='index.php?c=clienteDashboard&a=updatePhotoCliente' method="post" class="d-flex align-items-center p-2 flex-column rounded"  enctype="multipart/form-data" style="width: 260px; height: 320px; background-color: #311178;">
                        <div class="overflow-hidden mt-2 bg-primary rounded-circle  border border-4 border-white" style="width: 100px; height: 100px;">
                            <img src="./recursos_img_usuarios/avatarhombre.jpg" class="w-100 h-100">
                        </div>
                        <div class="mt-3">
                            <p class="fw-bold text-white">Cambiar foto de perfil</p>
                        </div>
                        <div class="w-100 d-flex justify-content-center mt-2">
                        <input type="hidden" value="${id}" name="id">
                            
                            <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados"  />
                            <label for="file-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                </svg>
                                <span class="iborrainputfile">Seleccionar archivo</span>
                            </label>
                        </div> 
                        <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    </form>
                    <form class=' py-5 px-4 needs-validation' novalidate action='index.php?c=clienteDashboard&a=updateClientInformation&id=${id}' method='post' id='formConfigUs' autocomplete='off' style='width: 800px'>
                        <section class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="text" class="form-control bg-transparent text-white" value="${resultado["nombres"]}" placeholder="Nombres" id="nombres_cli" name="nombres_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="text" class="form-control bg-transparent text-white" placeholder="Apellidos" value="${resultado["apellidos"]}" id="apellidos_cli" name="apellidos_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4  mb-3">
                                <select class="form-select form-select bg-transparent text-white" disabled aria-label=".form-select-sm example" id="tDocumento_cli" name="tDocumento_cli" required>
                                    <option class="text-dark" value="">${resultado["tipo_documento"]}</option>

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione una opcion
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="number" class="form-control bg-transparent text-white" value="${resultado["documento"]}" placeholder="Cedula" id="cedula_cli" readonly name="cedula_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="number" class="form-control bg-transparent text-white" placeholder="Celular" value="${resultado["celular"]}" id="celular_cli" name="celular_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="number" class="form-control bg-transparent text-white" value="${resultado["edad"]}" placeholder="Edad" id="edad_cli" name="edad_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="email" class="form-control bg-transparent text-white" placeholder="Email" value="${resultado["email"]}" id="email_cli" name="email_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating-sm mb-3 ">
                                    <input type="text" class="form-control bg-transparent text-white" placeholder="Usuario" value="${resultado["user"]}" id="usuario_cli" name="usuario_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating-sm mb-3 position-relative ">
                                    <input type="password" class="form-control bg-transparent text-white" placeholder="Contraseña" value="${resultado[" password"]}" id="password_cli" name="password_cli" required>
                                    <div class="invalid-feedback">
                                        El campo no pueda estar vacio
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <select class="form-select form-select bg-transparent text-white" aria-label=".form-select-sm example" disabled name="procedencia" required>
                                    <option class="text-dark" value="">${resultado["procedencia"]}</option>

                                </select>
                                <div class="invalid-feedback">
                                    Seleccione una opcion
                                </div>
                            </div>

                        </section>
                        <button type="submit" class="btn bg-yellow text-black fw-bold mt-4 ml-auto ms-auto">Guardar cambios</button>
                    </form>
          
            `;
      });
      $("#contenidoDash").html(template);
      document.getElementById("title-dashboard").textContent =  "Configuracion del usuario";
      $("#formConfigUs").submit(function (ev) {
        console.log($("#formConfigUs").attr("action"));
        $.ajax({
          type: "POST",
          url: $("#formConfigUs").attr("action"),
          data: $("#formConfigUs").serialize(),
          success: function (res) {
            if (res) {
              Swal.fire({
                icon: "success",
                title: "Actualizar infomacion",
                text: "Se han actualizadon la informacion del usuario satisfactoriamente!",
                color: "white",
                background: "#4618AC",
                iconColor: "white",
                showConfirmButton: false,
                timer: 3000,
              });
            }
          },
        });
        ev.preventDefault();
      });
    },
  });
}

function logout() {
  Swal.fire({
    title: "Log Out",
    text: "Estas seguro de cerrar sesión?",
    icon: "warning",
    showCancelButton: true,
    background: "#4618AC",
    color: "white",
    confirmButtonColor: "#FAD318",
    cancelButtonColor: "#d33",
    confirmButtonText: "Log out",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: "index.php?c=clienteDashboard&a=logout",
        success: function (response) {
          if (response) {
            console.log(response);
            window.location.href = "index.php";
          }
        },
      });
    }
  });
}

// "index.php?c=clienteDashboard&a=updateClientInformation"
