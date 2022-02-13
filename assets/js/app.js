getCategorias();

// window.onpopstate = function(e){ if(e.state){ document.getElementById("contenidoDash").innerHTML = e.state.html; document.title = e.state.pageTitle; } }


const opciones_menu = document.querySelectorAll(".opciones-menu");
opciones_menu.forEach(opciones =>{
    opciones.addEventListener("click", () => {
        opciones_menu.forEach(item => {
            item.classList.remove("active-menu-opcion");
        })
        opciones.classList.add("active-menu-opcion");
    })
});

function getCategorias() {
  const url = "index.php?c=clienteDashboard&a=viewCategorias";
  const http = new XMLHttpRequest();

  http.open("GET", url);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var template = "";
      var resultado = JSON.parse(this.responseText);
      resultado.map((categoria) => {
        template += `
                <div href = "" class="card text-decoration-none text-white" style="width: 18rem;" role="button" onclick="getSitios(${categoria.id})">
                    <img src='${categoria.img}' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">${categoria.nombre}</h5>
                        <p class="card-text">${categoria.descripcion}</p>
                    </div>
                </div>
                `;
      });
      document.getElementById("contenidoDash").innerHTML = template;
      // history.pushState(template, "index.php?c=clienteDashboard", "index.php?c=clienteDashboard");
    }
  };
  http.send();
}

function getSitios(id) {

  const url = "index.php?c=clienteDashboard&a=viewSitios&id=" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var template = "";
      var resultado = JSON.parse(this.responseText);
      resultado.map((sitios) => {
        template += `
                    <a href ="./Guias" class="card text-decoration-none text-white" style="width: 18rem;" onclick="getGuias(${sitios.id})">
                        <img src='${sitios.img}' loading="lazy" class="card-img-top" alt="..." style="max-height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title">${sitios.nombre}</h5>
                            <p class="card-text">${sitios.descripcion}</p>
                        </div>
                    </a>
                `;
      });
      document.getElementById("contenidoDash").innerHTML = template;
      // console.log(template);
      // history.pushState(template, "index.php?c=clienteDashboard&a=viewSitios&id=" + id, "index.php?c=clienteDashboard&a=viewSitios&id=" + id)
    }
  };
  http.send();
}

function getGuias(id) {
  
  const url = "index.php?c=clienteDashboard&a=viewguias&id=" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var template = "";
      var resultado = JSON.parse(this.responseText);
      resultado.map((Guias) => {
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
      document.getElementById("contenidoDash").innerHTML = template;
    }
  };
  http.send();
}
