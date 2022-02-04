const opciones_menu = document.querySelectorAll(".opciones-menu");

opciones_menu.forEach(opciones =>{
    opciones.addEventListener("click", () => {
        opciones_menu.forEach(item => {
            item.classList.remove("active-menu-opcion");
        })
        opciones.classList.add("active-menu-opcion");
    })   
})