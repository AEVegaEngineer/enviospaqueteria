jQuery(function($){
    console.log("usuario-register");
    $(".rowPersona").hide();
    $(".rowComercio").hide();
    $(".rowShopping").hide();
    //$('[data-toggle="tooltip"]').tooltip();
    //$('#registerForm').submit(function(){
    $('#btnRegistrar').click(function(){
        if($('#personaRadio').is(':checked')){
            //quita inputs de comercios y shoppings
            $('#comNombre').remove();
            $('#comCuit').remove();
            $('#comShoppingId').remove();
            $('#shopNombre').remove();
            $('#shopCuit').remove();
        } else if ($('#comercioRadio').is(':checked')){
            //quita inputs de personas y shoppings
            $('#perNombres').remove();
            $('#perApellidos').remove();
            $('#perDni').remove();
            $('#shopNombre').remove();
            $('#shopCuit').remove();
        } else if ($('#shoppingRadio').is(':checked')){
            //quita inputs de personas y comercios
            $('#perNombres').remove();
            $('#perApellidos').remove();
            $('#perDni').remove();
            $('#comNombre').remove();
            $('#comCuit').remove();
            $('#comShoppingId').remove();
        } else if ($('#empleadoRadio').is(':checked')){
            //quita inputs de comercios y shopping            
            $('#comNombre').remove();
            $('#comCuit').remove();
            $('#comShoppingId').remove();
            $('#shopNombre').remove();
            $('#shopCuit').remove();
        } else if ($('#adminRadio').is(':checked')){
            //quita inputs de comercios y shopping            
            $('#comNombre').remove();
            $('#comCuit').remove();
            $('#comShoppingId').remove();
            $('#shopNombre').remove();
            $('#shopCuit').remove();
        }
    });

    $('#personaRadio').click(function(){
        if($(".rowShopping").is(":visible")){
            $(".rowPersona").slideToggle();
            $(".rowShopping").slideToggle();
        } else if($(".rowComercio").is(":visible")){
            $(".rowComercio").slideToggle();
            $(".rowPersona").slideToggle();
        } else if(!$(".rowPersona").is(":visible")){
            $(".rowPersona").slideToggle();
        }
    });
    $('#comercioRadio').click(function(){
        if($(".rowPersona").is(":visible")){
            $(".rowComercio").slideToggle();
            $(".rowPersona").slideToggle();
        } else if($(".rowShopping").is(":visible")){
            $(".rowShopping").slideToggle();
            $(".rowComercio").slideToggle();
        } else {
            $(".rowComercio").slideToggle();
        }
    });
    $('#shoppingRadio').click(function(){
        if($(".rowPersona").is(":visible")){
            $(".rowPersona").slideToggle();
            $(".rowShopping").slideToggle();
        } else if($(".rowComercio").is(":visible")){
            $(".rowShopping").slideToggle();
            $(".rowComercio").slideToggle();
        } else {
            $(".rowShopping").slideToggle();
        } 
    });
    $('#empleadoRadio').click(function(){
        if($(".rowShopping").is(":visible")){
            $(".rowPersona").slideToggle();
            $(".rowShopping").slideToggle();
        } else if($(".rowComercio").is(":visible")){
            $(".rowComercio").slideToggle();
            $(".rowPersona").slideToggle();
        } else if(!$(".rowPersona").is(":visible")){
            $(".rowPersona").slideToggle();
        }
    });
    $('#adminRadio').click(function(){
        if($(".rowShopping").is(":visible")){
            $(".rowPersona").slideToggle();
            $(".rowShopping").slideToggle();
        } else if($(".rowComercio").is(":visible")){
            $(".rowComercio").slideToggle();
            $(".rowPersona").slideToggle();
        } else if(!$(".rowPersona").is(":visible")){
            $(".rowPersona").slideToggle();
        }
    });
});
$(document).ready(function(){    
    //validarInputPassword();
    
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