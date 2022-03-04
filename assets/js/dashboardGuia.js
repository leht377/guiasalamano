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

function getClientesSolicitando(){
  $.ajax({
    type: "GET",
    url: "index.php?c=guiaDashboard&a=getlistsolicitudguia",
    // beforeSend: function () {
    //   template = `
    //         <div class="spinner-border text-light" role="status">
    //             <span class="visually-hidden">Loading...</span>
    //         </div>
            
    //         `;
    //   $("#contenidoDash").html(template);
    // },
    success: function (response) {
      template = "";
      rows = "";
      var resultado = JSON.parse(response);
      console.log(resultado);
      resultado.forEach((cliente) => {
        rows += `
        <tr class="bg-blue">
        <td class="pt-2"> <img class="img-user-table rounded-circle" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            <div class="pl-lg-5 pl-md-3 pl-1 name">${cliente.cliente_nombre}</div>
        </td>
            <td class="pt-3 mt-1">${cliente.sitio_nombre}</td>
            <td class="pt-3">${cliente.fecha}</td>
            <td class="pt-3">${cliente.hora}</td>
        </tr>
        <tr id="spacing-row">
            <td></td>
        </tr>
        
        `;
      });
      template += `
            <div class="container rounded mt-2 bg-violet-light p-md-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                       ${rows}
                    </tbody>
                </table>
            </div>
        </div>
      `;

      // document.getElementById("title-dashboard").textContent = "Categorias para postularse";
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