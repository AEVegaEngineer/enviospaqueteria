jQuery(function($){
    
    $("#registerFormComercios").hide();
    $("#registerFormShoppings").hide();
    //$('[data-toggle="tooltip"]').tooltip();

    $('#personaRadio').click(function(){
        if($('#registerFormShoppings').is(":visible")){
            $('#registerFormPersonas').slideToggle();
            $("#registerFormShoppings").slideToggle();
        } else if($('#registerFormComercios').is(":visible")){
            $('#registerFormComercios').slideToggle();
            $('#registerFormPersonas').slideToggle();
        }
    });
    $('#comercioRadio').click(function(){
        if($('#registerFormPersonas').is(":visible")){
            $('#registerFormComercios').slideToggle();
            $("#registerFormPersonas").slideToggle();
        } else if($('#registerFormShoppings').is(":visible")){
            $('#registerFormShoppings').slideToggle();
            $('#registerFormComercios').slideToggle();
        }
    });
    $('#shoppingRadio').click(function(){
        if($('#registerFormPersonas').is(":visible")){
            $('#registerFormPersonas').slideToggle();
            $("#registerFormShoppings").slideToggle();
        } else if($('#registerFormComercios').is(":visible")){
            $('#registerFormShoppings').slideToggle();
            $('#registerFormComercios').slideToggle();
        }
    });
});
$(document).ready(function(){    
    validarInputPassword();
    
});
function validarInputPassword()
{
    var password = document.getElementById("usuContrasena")
      , confirm_password = document.getElementById("usuContrasenaConfirm");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las Contraseñas no coinciden");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
}