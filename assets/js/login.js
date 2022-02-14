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
          if (res) {
            Swal.fire({
              icon: "success",
              title: "Autenticación",
              text: "Autenticación exitosa!",
              color: 'black',
              showConfirmButton: false,
              timer: 3000
            });
            setTimeout(()=>{
                window.location.href = "index.php?c=clienteDashboard";
            },5000)
            
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