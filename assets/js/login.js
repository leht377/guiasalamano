$(document).ready(function () {
    login();
});
function login(){
    $("#form_login").submit(function (ev) {
      $.ajax({
        type: "POST",
        url: $("#form_login").attr("action"),
        data: $("#form_login").serialize(),
        success: function (res) {
        console.log(res);
        let resultado = JSON.parse(res);
        console.log(resultado[0]["status"]);

          if (resultado[0]["status"]) {
            Swal.fire({
              icon: "success",
              title: "Autenticación",
              text: "Autenticación exitosa!",
              color: 'black',
              showConfirmButton: false,
              timer: 3000
            });
            setTimeout(()=>{
              if(resultado[0]["rol"] === "1"){
                window.location.href = "index.php?c=clienteDashboard";

              }else if(resultado[0]["rol"] === "2") {
                window.location.href = "index.php?c=guiaDashboard";
              }
            },1000)
            
        }else{
            Swal.fire({
              icon: "error",
              title: "Autenticación",
              text: "Credenciales invalidas!",
              color: 'black',
              iconColor : 'red',
              showConfirmButton: false,
              timer: 3000
            }); 
          }
        }
      });
      ev.preventDefault();
    });
  }