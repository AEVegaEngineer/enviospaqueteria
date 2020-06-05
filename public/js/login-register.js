jQuery(function($){
    
    $("#registerFormComercios").hide();
    $("#registerFormShoppings").hide();
    //$('[data-toggle="tooltip"]').tooltip();

    $('#personaRadio').click(function(){
        if($('#shoppingRadio').is(":visible")){
            $('#registerFormPersonas').slideToggle();
            $("#registerFormShoppings").slideToggle();
        } else if($('#comercioRadio').is(":visible")){
            $('#registerFormComercios').slideToggle();
            $('#registerFormPersonas').slideToggle();
        }
    });
    $('#comercioRadio').click(function(){
        if($('#personaRadio').is(":visible")){
            $('#registerFormComercios').slideToggle();
            $("#registerFormPersonas").slideToggle();
        } else if($('#shoppingRadio').is(":visible")){
            $('#registerFormShoppings').slideToggle();
            $('#registerFormComercios').slideToggle();
        }
    });
    $('#shoppingRadio').click(function(){
        if($('#personaRadio').is(":visible")){
            $('#registerFormPersonas').slideToggle();
            $("#registerFormShoppings").slideToggle();
        } else if($('#comercioRadio').is(":visible")){
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
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm");

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