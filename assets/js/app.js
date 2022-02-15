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
  getCategorias();
});

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
                <div class="row text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    url: "index.php?c=clienteDashboard&a=getInformationFormUser&id="+id,
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
        template = ` 
        <form class='container-sm container-md p-5 needs-validation' novalidate action='index.php?c=clienteDashboard&a=updateClientInformation&id=${id}' method='post' id='formConfigUs' autocomplete='off' style='width: 800px;justify-self: start;'>
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
                           <input type="number" class="form-control bg-transparent text-white"  value="${resultado["documento"]}"  placeholder="Cedula" id="cedula_cli" readonly name="cedula_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>
                       </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                       <div class="form-floating-sm mb-3 ">
                           <input type="number" class="form-control bg-transparent text-white" placeholder="Celular"  value="${resultado["celular"]}" id="celular_cli" name="celular_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>
                       </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                       <div class="form-floating-sm mb-3 ">
                           <input type="number" class="form-control bg-transparent text-white"  value="${resultado["edad"]}" placeholder="Edad" id="edad_cli" name="edad_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>
                       </div>
                   </div>

                   <div class="col-sm-12">
                       <div class="form-floating-sm mb-3 ">
                           <input type="email" class="form-control bg-transparent text-white" placeholder="Email"  value="${resultado["email"]}" id="email_cli" name="email_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>
                       </div>
                   </div>

                   <div class="col-sm-6">
                       <div class="form-floating-sm mb-3 ">
                           <input type="text" class="form-control bg-transparent text-white" placeholder="Usuario"  value="${resultado["user"]}" id="usuario_cli" name="usuario_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>
                       </div>
                   </div>

                   <div class="col-sm-6">
                       <div class="form-floating-sm mb-3 position-relative ">
                           <input type="password" class="form-control bg-transparent text-white" placeholder="Contraseña"   value="${resultado["password"]}" id="password_cli" name="password_cli" required>
                           <div class="invalid-feedback">
                               El campo no pueda estar vacio
                           </div>

                       </div>
                   </div>

                   <div class="col-sm-12">
                       <select class="form-select form-select bg-transparent text-white" aria-label=".form-select-sm example"  disabled name="procedencia" required>
                           <option class="text-dark" value="">${resultado["procedencia"]}</option>

                       </select>
                       <div class="invalid-feedback">
                           Seleccione una opcion
                       </div>
                   </div>

               </section>
               <button type="submit" class="btn bg-yellow text-black fw-bold mt-4 ml-auto ms-auto" >Guardar cambios</button>
           </form>          
            `
      });
      $("#contenidoDash").html(template);
      document.getElementById("title-dashboard").textContent = "Configuracion del usuario";
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
                color: 'white',
                background : '#4618AC',
                iconColor : 'white',
                showConfirmButton: false,
                timer: 3000
              });
            }
          },
        });
        ev.preventDefault();
      });
    },
  });
}
function logout(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "GET",
            url: "index.php?c=clienteDashboard&a=logout",
            success: function (response) {
              if(response){
                console.log(response);
                window.location.href ="index.php"; 

              }
            }
          })
        }
      })
}

  

// "index.php?c=clienteDashboard&a=updateClientInformation"
