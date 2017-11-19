$(document).ready(function(){
  
$.validator.setDefaults({
  ignore: []
});

$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value)
       && /[a-z]/.test(value)
       && /\d/.test(value)
       && /[A-Z]/.test(value)
       && /[-@._*]/.test(value)
});

$.validator.addMethod("nomrest", function(value) {
   return /^[A-Za-z0-9\d=!\. ]*$/.test(value)
       && /[a-zA-Z]/.test(value)       
});

$.validator.addMethod("nom", function(value) {
   return /^[A-Za-z ]*$/.test(value)
       && /[a-z]/.test(value)
});

$.validator.addMethod("emailcheck",function(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
});

$.validator.addMethod("rif", function(value) {
   return /^['V''v''J''j'][-][0-9]*$/.test(value)
});

$.validator.addMethod("descripcion", function(value) {
   return /^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\d=!\.,-º ]*$/.test(value)
       && /[a-z]/.test(value)
});

$(function() {
  $("#registro").validate({
    rules: {
      username:{
        required: true,
        minlength: 2,
        maxlength: 16,
        nom: true
      },
      password:{
        required: true,
        minlength: 6,
        maxlength: 16,
        pwcheck: true
      },
      password2:{
        equalTo: "#password"
      },
      email:{
        required: true,
        emailcheck: true,
        email: true
      },
      restname:{
        required: true,
        minlength: 2,
        maxlength: 32,
        nomrest: true
      },
      restdesc:{
        maxlength: 500,
        descripcion: true
      },
      categoria:{
        required: true
      },
      rif:{
        rif:true,
        maxlength: 11,
        minlength: 11
      },
      ubicacion:{
        required: true,
        maxlength: 100,
        descripcion: true
      },
      horario:{
        required: true
      }
    },
    messages: {
      username:{
        required: "Debe introducir el nombre de usuario",
        minlength: "Debe contener entre 2 y 16 caracteres",
        maxlength: "Debe contener entre 2 y 16 caracteres",
        nom: "El nombre solo puede estar compuesto por letras"
      },
      password:{
        required: "Debe introducir una contraseña",
        minlength: "Debe contener entre 6 y 16 caracteres",
        maxlength: "Debe contener entre 6 y 16 caracteres",
        pwcheck: "La contraseña debe tener al menos una letra mayuscula, una minuscula, un numero y un caracter especial (-@._*)"
      },
      password2:{
        equalTo: "Las contraseñas deben coincidir"
      },
      email:{
        required: "Debe introducir un correo",
        emailcheck: "Debe introducir un correo valido",
        email: "Debe introducir un correo valido"
      },
      restname:{
        required: "Debe introducir le nombre del restaurante",
        minlength: "Debe contener entre 2 y 32 caracteres",
        maxlength: "Debe contener entre 2 y 32 caracteres",
        nomrest: "El nombre solo puede estar compuesto por letras, numeros y puntos"
      },
      restdesc:{
        maxlength: "Debe tener menos de 500 caracteres",
        descripcion: "La descripcion solo puede tener letras, numeros, comas, puntos y guiones"
      },
      categoria:{
        required: "Debe elegir una categoria"
      },
      rif:{
        rif:"El formato del rif debe ser V-12346789 o J-123456789",
        maxlength: "RIF invalido",
        minlength: "RIF invalido",
      },
      ubicacion:{
        required: "Debe introducir una dirección",
        maxlength: "Debe tener menos de 100 caracteres",
        descripcion: "La ubicacion solo puede estar compuesta por letras, numeros, comas, puntos y guiones"
      },
      horario:{
        required: "Debe introducir un horario"
      }
    },
    errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
  });
});
});