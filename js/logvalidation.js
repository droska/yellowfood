$(document).ready(function(){

$.validator.addMethod("nom", function(value) {
   return /^[A-Za-z ]*$/.test(value)
       && /[a-z]/.test(value)
});

$(function() {
  $("#login").validate({
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
        maxlength: 16
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
        maxlength: "Debe contener entre 6 y 16 caracteres"
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