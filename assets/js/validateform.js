
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          console.log(!form.checkValidity());
          form.classList.add('was-validated')
        }, false)
      })
  })()



function showPassword(ID_input) { 
    
    const passwordInput = document.getElementById(ID_input);
    const btnShowPassword = document.getElementById('btn-show-password');

    if(btnShowPassword.classList.contains('fa-eye')){
        btnShowPassword.classList.replace('fa-eye','fa-eye-slash')
        passwordInput.type = 'text';

    }else{
        btnShowPassword.classList.replace('fa-eye-slash','fa-eye')
        passwordInput.type = 'password';
    }
}