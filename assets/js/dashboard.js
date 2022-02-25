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