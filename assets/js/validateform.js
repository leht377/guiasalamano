(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }else{
          form.classList.add("chek");
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();

$(document).ready(function () {

  createClient();
  createGuia();
});

function createClient (){
  $("#box-card-registrouser").submit(function (ev) {
  if($("#box-card-registrouser").hasClass("chek") ){
    
    $.ajax({
      type: "POST",
      url: $("#box-card-registrouser").attr("action"),
      data: $("#box-card-registrouser").serialize(),
      success: function (res) {
        console.log(res);
        switch (res) {
          case 'creado':
            Swal.fire({
              icon: "success",
              title: "Estado",
              text: "Se creo el cliente satisfactoriamente",
              color: "black",
              showConfirmButton: false,
              timer: 3000
            }); 

            setTimeout(function () {
              window.location.href = "index.php";
            },1000);

            break;

          case 'existe correo':
            Swal.fire({
              icon: "error",
              title: "Estado",
              text: "El correo ya se encuentra registrado",
              color: "black",
              showConfirmButton: false,
              timer: 3000
            }); 
            break;
          case 'existe cedula' :
            Swal.fire({
              icon: "error",
              title: "Estado",
              text: "La cedula ya se encuentra registrada",
              color: "black",
              showConfirmButton: false,
              timer: 3000
            }); 
            break;
          case 'existe usuario':
            Swal.fire({
              icon: "error",
              title: "Estado",
              text: "El nombre de usuario ya se encuentra registrado",
              color: "black",
              showConfirmButton: false,
              timer: 3000
            }); 
            break;
          default:
            break;
        }
      }
    });
    ev.preventDefault();
  }
  });
}

function createGuia (){
  $("#box-card-guia").submit(function (ev) {
    if($("#box-card-guia").hasClass("chek")){
      $.ajax({
        type: "POST",
        url: $("#box-card-guia").attr("action"),
        data: $("#box-card-guia").serialize(),
        cache: false,
        processData:false,
        success: function (res) {
        console.log(res);
          switch (res) {
            case 'creado':
              Swal.fire({
                icon: "success",
                title: "Estado",
                text: "Se creo el cliente satisfactoriamente",
                color: "black",
                showConfirmButton: false,
                timer: 3000
              }); 

              setTimeout(function () {
                window.location.href = "index.php";
              },1000);

              break;

            case 'existe correo':
              Swal.fire({
                icon: "error",
                title: "Estado",
                text: "El correo ya se encuentra registrado",
                color: "black",
                showConfirmButton: false,
                timer: 3000
              }); 
              break;
            case 'existe cedula' :
              Swal.fire({
                icon: "error",
                title: "Estado",
                text: "La cedula ya se encuentra registrada",
                color: "black",
                showConfirmButton: false,
                timer: 3000
              }); 
              break;
            case 'existe usuario':
              Swal.fire({
                icon: "error",
                title: "Estado",
                text: "El nombre de usuario ya se encuentra registrado",
                color: "black",
                showConfirmButton: false,
                timer: 3000
              }); 
              break;
            case 'No crear':
              Swal.fire({
                icon: "error",
                title: "Estado",
                text: "No se pudo crear el guia",
                color: "black",
                showConfirmButton: false,
                timer: 3000
              }); 
              break;
          }
        }
      });
      ev.preventDefault();
    }
  });
}

function showPassword(ID_input) {
  
  const passwordInput = document.getElementById(ID_input);
  const btnShowPassword = document.getElementById("btn-show-password");

  if (btnShowPassword.classList.contains("fa-eye")) {
    btnShowPassword.classList.replace("fa-eye", "fa-eye-slash");
    passwordInput.type = "text";  
  } else {
    btnShowPassword.classList.replace("fa-eye-slash", "fa-eye");
    passwordInput.type = "password";
  }

}
