$(document).ready(function(){
  
$.validator.setDefaults({
  ignore: []
});

$.validator.addMethod("descripcion", function(value) {
  return /^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ,-º ]*$/.test(value)
});

$.validator.addMethod("precio", function(value) {
  return /^[0-9., ]*$/.test(value)
       && /[0-9]/.test(value)
});

$.validator.addMethod("nom", function(value) {
  return /^[A-Za-z0-9 ]*$/.test(value)
});

$(function() {
  $("#plato").validate({
    rules: {
      pname:{
        required: true,
        minlength: 2,
        maxlength: 16,
        nom: true
      },
      pdesc:{
        required: true,
        maxlength: 500,
        descripcion: true
      },
      precio:{
        required: true,
        precio: true
      },
      pcat:{
        required: true
      }
    },
    messages: {
      pname:{
        required: "Debe introducir el nombre de usuario",
        minlength: "Debe contener entre 2 y 16 caracteres",
        maxlength: "Debe contener entre 2 y 16 caracteres",
        nom: "El nombre solo puede estar compuesto por letras y numeros"
      },
      pdesc:{
        required: "Debe introducir una breve descripción",
        maxlength: "Debe tener menos de 500 caracteres",
        descripcion: "La descripcion solo puede tener letras, numeros, comas, puntos y guiones"
      },
      precio:{
        required: "Debe introducir el precio del plato",
        precio: "El precio solo puede tene numeros, puntos y comas"
      },
      pcat:{
        required: "Debe introducir una categoria"
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