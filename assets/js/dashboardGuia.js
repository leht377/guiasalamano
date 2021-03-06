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
    getClientesSolicitando();
});
function aceptarSolicitud(id_contrato){
  Swal.fire({
    title: "Aceptar solicitud",
    text: "Estas seguro de aceptar la solicitud?",
    icon: "warning",
    showCancelButton: true,
    background: "#4618AC",
    color: "white",
    confirmButtonColor: "#FAD318",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "index.php?c=guiaDashboard&a=aceptarSolicitudContrato",
        data: {"id_contrato":id_contrato},
        cache: false,
        success: function (response) {
          if (response == 1) {
            Swal.fire({
              icon: "success",
              title: "Aceptar solicitud",
              text: "Se ha completado exitosamente la operacion!",
              color: 'black',
              showConfirmButton: false,
              timer: 3000
            });
            setTimeout(()=>{
              getClientesSolicitando();
            },800);   
          }
        },
      });
    }
  });
}

function rechazarSolicitud(id_contrato){
    Swal.fire({
      title: "Rechazar solicitud",
      text: "Estas seguro de rechazar la solicitud?",
      icon: "warning",
      showCancelButton: true,
      background: "#4618AC",
      color: "white",
      confirmButtonColor: "#FAD318",
      cancelButtonColor: "#d33",
      confirmButtonText: "Rechazar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "index.php?c=guiaDashboard&a=rechazarSolicitudContrato",
          data: {"id_contrato":id_contrato},
          cache: false,
          success: function (response) {
            if (response == 1) {
              Swal.fire({
                icon: "success",
                title: "Rechazar solicitud",
                text: "Se ha completado exitosamente la operacion!",
                color: 'black',
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(()=>{
                getClientesSolicitando();
              },800);   
            }
          },
        });
      }
    });
}

function finalizarContrato(id_contrato){
  Swal.fire({
    title: "Finalizar",
    text: "Estas seguro de Finalizar el contrato para su calificacion?",
    icon: "warning",
    showCancelButton: true,
    background: "#4618AC",
    color: "white",
    confirmButtonColor: "#FAD318",
    cancelButtonColor: "#d33",
    confirmButtonText: "Rechazar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "index.php?c=guiaDashboard&a=finalizarContrato",
        data: {"id_contrato":id_contrato},
        cache: false,
        success: function (response) {
          if (response == 1) {
            Swal.fire({
              icon: "success",
              title: "Rechazar solicitud",
              text: "Se ha completado exitosamente la operacion!",
              color: 'black',
              showConfirmButton: false,
              timer: 3000
            });
            setTimeout(()=>{
              getClientesSolicitando();
            },800);   
          }
        },
      });
    }
  });
}

function getClientesAceptados(){
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=getlistclienteAceptados",
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
      resultado.forEach((cliente,index) => {
        rows += `

        <tr class="${index % 2 == 0 ? 'bg-violet':'bg-violet-dark' } border-0 filas">
            <td class = "text-white fw-bold border-0 align-middle">
                <img loanding="lazy" src="${cliente.foto}" class="rounded-circle" style="width: 40px; height: 40px;">
               ${cliente.cliente_nombre} 
            </td>
            <td class="text-white border-0 fw-bold align-middle" >${cliente.sitio_nombre}</td>
            <td class="text-white border-0 fw-bold  d-flex justify-content-between align-items-center" >
                <div>
                    ${cliente.fecha} 
                </div>
                <div class="dropstart">
                    <a class="btn text-white btn_solicitado" href="#"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu bg-violet-dark menu_clientes_solicitado" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item text-white fw-bold" href="#" >Ver informacion completa</a></li>
                      <li><a class="dropdown-item text-white fw-bold" href="#" >Aceptar solicitud</a></li>
                      <li><a class="dropdown-item text-white fw-bold" href="#">Rechazar solicitud</a></li>
                    </ul>
                </div> 
            
            </td>
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

       document.getElementById("title-dashboard").textContent = "Clientes Aceptados";
      $("#contenidoDash").html(template);

    },
  });
}

function getContratosFinalizados(){
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=getlistContratoFinalizado",
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
      resultado.forEach((cliente,index) => {
        rows += `

        <tr class="${index % 2 == 0 ? 'bg-violet':'bg-violet-dark' } border-0 filas">
            <td class = "text-white fw-bold border-0 align-middle">
                <img loanding="lazy" src="${cliente.foto}" class="rounded-circle" style="width: 40px; height: 40px;">
               ${cliente.cliente_nombre} 
            </td>
            <td class="text-white border-0 fw-bold align-middle" >${cliente.sitio_nombre}</td>
            <td class="text-white border-0 fw-bold  d-flex justify-content-between align-items-center" >
                <div>
                    ${cliente.fecha} 
                </div>
                <div class="dropstart">
                    <a class="btn text-white btn_solicitado" href="#"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu bg-violet-dark menu_clientes_solicitado" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item text-white fw-bold" href="#" onclick="finalizarContrato(${cliente.id_contrato})" >Finalizar para calificar</a></li>
                    </ul>
                </div> 
            
            </td>
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

       document.getElementById("title-dashboard").textContent = "Contratos Finalizados";
      $("#contenidoDash").html(template);

    },
  });
}

function getClientesSolicitando(){
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=getlistsolicitudguia",
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
      resultado.forEach((cliente,index) => {
        rows += `
        <tr class="${index % 2 == 0 ? 'bg-violet':'bg-violet-dark' } border-0 filas">
            <td class = "text-white fw-bold border-0 align-middle">
                <img loanding="lazy" src="${cliente.foto}" class="rounded-circle" style="width: 40px; height: 40px;">
               ${cliente.cliente_nombre} 
            </td>
            <td class="text-white border-0 fw-bold align-middle" >${cliente.sitio_nombre}</td>
            <td class="text-white border-0 fw-bold align-middle" >${cliente.hora}</td>
            <td class="text-white border-0 fw-bold align-middle" >${cliente.hora_fin}</td>
            <td class="text-white border-0 fw-bold  d-flex justify-content-between align-items-center" >
                <div>
                    ${cliente.fecha} 
                </div>
                <div class="dropstart">
                    <a class="btn text-white btn_solicitado" href="#"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </a>
                    <ul class="dropdown-menu bg-violet-dark menu_clientes_solicitado" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item text-white fw-bold" href="#" >Ver informacion completa</a></li>
                      <li><a class="dropdown-item text-white fw-bold" href="#" onclick="aceptarSolicitud(${cliente.id_contrato})" >Aceptar solicitud</a></li>
                      <li><a class="dropdown-item text-white fw-bold" href="#" onclick="rechazarSolicitud(${cliente.id_contrato})">Rechazar solicitud</a></li>
                    </ul>
                </div> 
            
            </td>
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
                          <th scope="col">Hora inicio</th>
                          <th scope="col">Hora fin</th>
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

       document.getElementById("title-dashboard").textContent = "Clientes solicitando servicios";
      $("#contenidoDash").html(template);

    },
  });
}

function getCategorias() {
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=viewCategorias",
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
      document.getElementById("title-dashboard").textContent = "Categorias para postularse";
      //   $("#title-dashboard").text = "Catergorias";
      $("#contenidoDash").html(template);
    },
  });
}

function getSitios(id) {
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=viewSitios&id=" + id,
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
                    <a href ="#" class="card text-decoration-none text-white" style="width: 18rem;" onclick="postularSitio(${sitios.id})">
                        <img src='${sitios.img}' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title">${sitios.nombre}</h5>
                            <p class="card-text">${sitios.descripcion}</p>
                        </div>
                    </a>
                `;
      });
      document.getElementById("title-dashboard").textContent = "Sitios para postularse";
      $("#contenidoDash").html(template);
    },
  });
}

function postularSitio(id_sitio){  
    Swal.fire({
      title: "Postularse",
      text: "Estas seguro de postularse para este destino?",
      icon: "warning",
      showCancelButton: true,
      background: "#4618AC",
      color: "white",
      confirmButtonColor: "#FAD318",
      cancelButtonColor: "#d33",
      confirmButtonText: "Postularse",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: 'index.php?c=guiaDashboard&a=postularsitio',
          data: {"id_sitio":id_sitio},
          cache: false,
          success: function (res) {
            switch (res) {
              case "true":
                Swal.fire({
                  icon: "success",
                  title: "Estado",
                  text: "Se postulo correctamente al destino",
                  color: "black",
                  showConfirmButton: false,
                  timer: 3000
                }); 
      
                setTimeout(function () {
                  window.location.href = "index.php?c=guiaDashboard";
                },1000);
      
                break;
              case "false":
                Swal.fire({
                  icon: "error",
                  title: "Estado",
                  text: "No se pudo postular al destino",
                  color: "black",
                  showConfirmButton: false,
                  timer: 3000
                }); 
                break;
            }
          }
        });
      }
    });
  
}

function logout() {
    Swal.fire({
      title: "Log Out",
      text: "Estas seguro de cerrar sesi??n?",
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
          url: "index.php?c=guiaDashboard&a=logout",
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