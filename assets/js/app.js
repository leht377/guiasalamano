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

function enviarFormSolicitarguia(){
  document.getElementById("btnsolicitarcliente").click();
}

function limpiarStart(){
  let start = document.querySelectorAll(".estrella");
  start.forEach((e)=>{
       e.classList.remove("startActive");
  });
}

function enviarCalificacion(){
    let start = document.querySelectorAll(".startActive");
    var calificacion = start.length;
    var id_guia =  $('#id_guia_modal').val();
    var id_contraro =  $('#id_contraro_modal').val();
    $.ajax({
      type: "POST",
      url: "index.php?c=clienteDashboard&a=guardarCalificacion",
      data: {"calificacion": calificacion,"id_guia":id_guia,"id_contrato":id_contraro},
      success: function (response) {
        console.log("respons : "+response);
        if(response){
          Swal.fire({
            icon: "success",
            title: "Actualizar infomacion",
            text: "Se han calificado al guia!",
            color: "white",
            background: "#4618AC",
            iconColor: "white",
            showConfirmButton: false,
            timer: 3000,
          });
          setTimeout(()=>{
              window.location.href = "index.php?c=clienteDashboard"
          },1000);
        }
      }
    });
}

function calificar(calificacion){
  let start = document.querySelectorAll(".estrella");
  calificacion = calificacion-1;
   
  limpiarStart();

   let iteracciones = 0;
   for(let i = 4; i >= 0 ; i--){
       if(iteracciones <= calificacion){
           start[i].classList.add("startActive");
       }
       iteracciones +=1;
   }
}

function showModalCalificarguia(id_guia,nombre_guia,destino,fecha,foto_guia,foto_destino,precio,id_contraro){
  var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
    keyboard: false
  });
  myModal.show();
  limpiarStart();
  $('#name_guia_modal').text(nombre_guia);
  $('#precio_destino_modal').text(precio);
  $('#destino_modal').attr("value",destino);
  $('#id_contraro_modal').attr("value",id_contraro);
  $('#id_guia_modal').attr("value",id_guia);
  $('#fecha_destino_modal').attr("value",fecha);
  $("#foto_guia_modal").attr("src",foto_guia);
  $("#foto_destino_modal").attr("src",foto_destino);

}

function getGuiasparaCalificar(){
  $.ajax({
    type: "GET",
    url: "index.php?c=clienteDashboard&a=listguiasContratofinalizado",
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
      rows = "";
      var resultado = JSON.parse(response);
      console.log(resultado);
      resultado.forEach((data,index) => {
        rows += `
        <tr class="${index % 2 == 0 ? 'bg-violet':'bg-violet-dark' } border-0 filas" role="button"  onclick="showModalCalificarguia('${data.guia_id}','${data.guia_nombre}','${data.nombre_sitio}','${data.fecha}','${data.foto_guia}','${data.sitio_foto}','${data.precio}','${data.id_contrato}')">
            <td class="text-white border-0 fw-bold align-middle" >${data.guia_nombre}</td>
            <td class="text-white border-0 fw-bold align-middle" >${data.nombre_sitio}</td>
            <td class="text-white border-0 fw-bold align-middle" >${data.fecha}</td> 
            
           
        </tr>
    
        `;
      });

      template += `
          <div class="w-100">
          <div class="table-responsive">
              <table class="table overflow-hidden rounded border-0" >
                  <thead>
                      <tr class="bg-violet-dark text-white fs-5">
                          <th scope="col">Nombre</th>
                          <th scope="col">Destino</th>
                          <th scope="col">Fecha</th>
                      </tr>
                  </thead>
                  <tbody>
                      ${rows}
                  </tbody>
              </table>
          </div>
      </div>
      `;

       document.getElementById("title-dashboard").textContent = "Calificar guias";
      $("#contenidoDash").html(template);

    },
  });
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
    let hora_final = document.getElementById("hora_final").value;
    $.ajax({
      type: "POST",
      url: $("#formsolicitarguia").attr("action"),
      data: {"hora_solicitud":hora_solicitud,"hora_final":hora_final,"fecha_solicitud":fecha_solicitud,"id_sitio": id_sitio,"id_guia": id_guia},
      beforeSend: function () {
        Swal.fire({
          title: '<strong>Procesando solicitud</strong>',
          icon: 'info',
          background: "#4618AC",
          html:`
          <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Loading...</span>
          </div>`,
          color: "white",
          showConfirmButton: false
        })
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
      let date = new Date();
      let output = date.getFullYear() +'-'+String(date.getMonth() + 1).padStart(2, '0') + '-'+ String(date.getDate()).padStart(2, '0');

      var resultado = JSON.parse(response);
      console.log(resultado);
      template = `
      <div class="row container-fluid p-2 py-3 rounded">
                            <div class="container  order-xl-1 order-2 col-12 col-sm-12 col-xl-3 d-flex flex-column justify-content-start ">
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
                                            <div class="d-flex justify-content-center col-12" style="font-size: 1.2rem;">
                                                <span class="${resultado[0].calificacion >= 1 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                                <span class="${resultado[0].calificacion >= 2 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                                <span class="${resultado[0].calificacion >= 3 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                                <span class="${resultado[0].calificacion >= 4 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                                <span class="${resultado[0].calificacion >= 5 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="btn bg-yellow text-dark fw-bold d-block w-100" id="solicitarGuia" onclick="enviarFormSolicitarguia()" >Solicitar</button>
                                    <button class="btn bg-yellow text-dark fw-bold mt-2 d-block w-100" >Cancelar</button>
                                </div>
                                
                            </div>
                            <div class="col-12 col-xl-9 mt-3 mt-xl-0 order-xl-2 order-1">
                                <header class="w-100" style="height: 200px;">
                                    <img class="w-100 h-100 rounded" style="object-fit: cover;" src="${resultado[1].img}" >
                                </header>
                                <section class=" mt-3 p-2">
                                    <form action="index.php?c=clienteDashboard&a=solcitarguia" metod= "post" class="row" id="formsolicitarguia">
                                        <h3 class="fw-bold text-white">Informacion del Guia</h3>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3 bg-violet-dark  bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white bg-transparent fw-bold border-0 " id="inputGroup-sizing-sm">Nombres</span>
                                                <input readonly type="text" class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[0].nombre_guia}">
                                              </div>
                                              
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3 bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white fw-bold bg-transparent border-0" id="inputGroup-sizing-sm">Apellidos</span>
                                                <input readonly  type="text" class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[0].apellido_guia}">
                                              </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Destino</span>
                                                <input readonly type="text" class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[1].nombre}">
                                              </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-sm bg-violet-dark bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Precio</span>
                                                <input  readonly type="number" class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value ="${resultado[1].precio}">
                                              </div>
                                        </div>
                                        <h3 class="fw-bold text-white">Seleccionar horario </h3>
                                        <div class="col-12 col-xl-6">
                                            <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm ">Fecha de contratacion</span>
                                                <input type="date" name="fecha_solicitud" min="${output}" id="fecha_solicitud" required class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                              </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                                                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Hora de contratacion</span>
                                                <input type="time" name="hora_solicitud" id="hora_solicitud" required class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                              </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                        <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                                            <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm ">Hora de finalizacion</span>
                                            <input type="time" name="hora_final"  id="hora_final" required class="form-control bg-transparent text-white border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
      console.log(resultado);
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
                                <p>Edad: ${Guias.edad}</p>
                                <div>
                                    <p>Calificacion</p>
                                    <div class="d-flex justify-content-center col-12" style="font-size: 1.2rem;">
                                      
                                        <span class="${Guias.calificacion >= 1 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                        <span class="${Guias.calificacion >= 2 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                        <span class="${Guias.calificacion >= 3 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                        <span class="${Guias.calificacion >= 4 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                        <span class="${Guias.calificacion >= 5 ? 'startActive' : '' }"><i class="fa-solid fa-star" ></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
      });
      document.getElementById("title-dashboard").textContent = "Guias postulados " + nombre;
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
        <section class="w-100 row">
        <div class="col-12 col-xl-6 order-2 order-xl-1 ">
          <h5 class="mb-4 text-white">Cambiar informacion personal</h5>
          <form class="needs-validation" novalidate action='index.php?c=clienteDashboard&a=updateClientInformation' id='formConfigUs' autocomplete='off' method="post">
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Nombres</span>
                <input  type="text" class="form-control bg-transparent text-white border-0" id="nombres_cli" name="nombres_cli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required value ="${resultado["nombres"]}">
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Apellidos</span>
                <input  type="text" class="form-control bg-transparent text-white border-0" id="apellidos_cli" name="apellidos_cli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required value ="${resultado["apellidos"]}">
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Telefono</span>
                <input  type="number" class="form-control bg-transparent text-white border-0" id="celular_cli" name="celular_cli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required value ="${resultado["celular"]}">
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Correo</span>
                <input  type="email" class="form-control bg-transparent text-white border-0" id="email_cli" name="email_cli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required value ="${resultado["email"]}">
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                  <select class="form-select text-white bg-transparent fw-bold border-0" id="inputGroupSelect04" name="procedencia" aria-label="Example select with button addon" required>
                    <option value="1">Nacionalidad</option>
                  </select>
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>

            <button type="submit" class="btn btn-yellow py-2 px-2 fw-bold">Actualizar</button>
          </form>
        </div>
        <div class="col-12 col-xl-6 order-1 order-xl-2">
          <h5 class="text-white">Cambiar foto de perfil</h5>
          <form action='index.php?c=clienteDashboard&a=updatePhotoCliente' method="post" class="d-flex align-items-center p-2 flex-column"  enctype="multipart/form-data" style="width: 270px; height: 270px; background-color: #311178; border-radius:10px;">
            <div class="overflow-hidden mt-2 bg-primary rounded-circle  border border-4 border-white" style="width: 90px; height: 100px;">
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
        </div>
        <div class="col-12 col-xl-6 order-3 order-xl-3">
          <h5 class="text-white mb-4 mt-3">Cambiar contraseña</h5>
          <form action='index.php?c=clienteDashboard&a=changePassword' method="post">
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Contaseña antigua: </span>
                <input  type="password" class="form-control bg-transparent text-white border-0" id="old_password" name="old_password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required>
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Contraseña nueva: </span>
                <input  type="password" class="form-control bg-transparent text-white border-0" id="new_password" name="new_password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required>
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <div>
              <div class="input-group input-group-sm mb-3 bg-violet-dark bg-violet-dark rounded p-1">
                <span class="input-group-text text-white bg-transparent fw-bold border-0" id="inputGroup-sizing-sm">Confirmar contraseña: </span>
                <input  type="password" class="form-control bg-transparent text-white border-0" id="con_new_password" name="con_new_password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  required>
              </div>
              <div class="invalid-feedback">
                El campo no pueda estar vacio
              </div>
            </div>
            <button type="submit" class="btn btn-yellow py-2 px-2 fw-bold">Cambiar</button>
          </form>
        </div>
      </section>
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
            console.log(res);
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

              setTimeout(()=>{
                window.location.reload();
              },3500)
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
