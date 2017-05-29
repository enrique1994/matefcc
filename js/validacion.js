      window.Parsley
  .addValidator('validarNombres', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      //console.log(value,requirement);
      //requirement es el valor esperado
      //value es el valor que el usuario ingresa
      //se comparan 
      console.log(value);
      if(requirement.test(value)){
        return true;
      }
      return false;
    },
    messages: {
      en: 'El nombre o apellidos sólo deben contener letras',
    }
  });


//validacion para el primer caracter de la contraseña
// ej: data-parsley-validar-pass="/^A/g"
// ej2: data-parsley-validar-pass="/^P/g"
//el primer caracter debe iniciar con una A en el primer ejemplo, 
//en el segundo, con una P.
      window.Parsley
  .addValidator('validarPassA', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      //console.log(value,requirement);
      //requirement es el valor esperado
      //value es el valor que el usuario ingresa
      //se comparan 
      if(requirement.test(value)){
        return true;
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe iniciar con una A',
    }
  });

       window.Parsley
  .addValidator('validarPassP', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      //console.log(value,requirement);
      //requirement es el valor esperado
      //value es el valor que el usuario ingresa
      //se comparan 
      if(requirement.test(value)){
        return true;
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe iniciar con una P',
    }
  });

        window.Parsley
  .addValidator('validarPassC', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      //console.log(value,requirement);
      //requirement es el valor esperado
      //value es el valor que el usuario ingresa
      //se comparan 
      if(requirement.test(value)){
        return true;
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe iniciar con una C',
    }
  });

  //valida el tamaño de la contraseña
  //la contraseña debe ser de un tamaño especifico
  //ej: data-parsley-validar-pass-tam="7"
  // el tamaño deseado es 7
        window.Parsley
  .addValidator('validarPassTam', {
    requirementType: 'string',
    validateString: function(value, requirement) {
     // console.log(value,requirement);
     //se comparan los tamaños
      if(value.length == requirement){
        return true;
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe tener %s caracteres',
    }
  });

  //lo mismo pero para cualquier input
       window.Parsley
  .addValidator('validarTam', {
    requirementType: 'string',
    validateString: function(value, requirement) {
     // console.log(value,requirement);
     //se comparan los tamaños
      if(value.length == requirement){
        return true;
      }
      return false;
    },
    messages: {
      en: 'Este campo debe tener %s caracteres',
    }
  });
//las validaciones siguientes son exclusivas para la contraseña de coordinador
  //validacion para que el mes sea correcto
  //uso: data-parsley-validar-pass-mes="/\d{2}/g"

         window.Parsley
  .addValidator('validarPassMes', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      //console.log(value,requirement);
      //verifica con la condicion /\d{2}/g
      ///\d{2}/g significa "busca en la cadena dos digitos"
      if(requirement.test(value)){
        //si es correcto, compara estos dos digitos para que sean meses correctos
        // entre 01 y 12
        var mes = value.match(requirement);
        var regex = /^(0?[1-9]|1[012])$/;
        if(regex.test(mes)){
        return true;
        }
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe contener un mes correcto 01-12',
    }
  });

//valida si los tres ultimos caracteres son letras
//uso: data-parsley-validar-pass-U3="/\D{3}$/g"
           window.Parsley
  .addValidator('validarPassU3', {
    requirementType: 'regexp',
    validateString: function(value, requirement) {
      console.log(value,requirement);
      if(requirement.test(value)){
        return true;
      }
      return false;
    },
    messages: {
      en: 'La contraseña debe tener 3 letras al final',
    }
  });