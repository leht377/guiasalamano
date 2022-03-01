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
});

function getClientesSolicitando(){
  template = "";
  template += ``;
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