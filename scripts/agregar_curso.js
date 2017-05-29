   $(function () {

  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
  //  $('#sucess').toggleClass('hidden', !ok);
    $('#error_valid').toggleClass('hidden', ok);
  })
  // por default, no enviaremos el formulario.
  var submitForm = false;

  $("#demo-form").on('submit', function(e) {
    e.preventDefault();
    // si submitForm es false, se detiene la acción predeterminada.
    // Cuando el primer 'submit' se activa, se debe evitar la acción predeterminada
    if (!submitForm) {
      e.preventDefault();
    }
    var form = $(this);
    //validar el formulario
    form.parsley().validate(); 

    // si todo el formulario es valido
    if (form.parsley().isValid()) {
      submitForm = true;
      // envia los datos

      //obtiene los datos ingresados
     var data = $('#demo-form').serialize();

      $.ajax({	
				type : 'POST',
				url  : '../php/agregar_curso.php',
        data : data,
				success :  function(data)
						   {						
								if(data=="error"){
                                   
								    console.log("aleeeert1");
                                    alert("Hay un error en el horario del curso");

                    				
								}
								else if(data=="registrado")
								{
                                    console.log("aleeeert");
                                    alert("Curso agregado correctamente");
                 
    
								}
                								else if(data=="empalmado")
								{
                                    console.log("aleeeert");
                                    alert("Error: horario empalmado");
                 
    
								}
                                else{
                                  alert("Hay un error.");
                                    console.log(data);
                                }
                
			
						   }
				});

  
    } else {
      //Puede haber ocasiones en que el formulario es válido y luego se convierte en no válido. En estos casos, 
      // vuelve a establecer la variable en false.
      submitForm = false;
    }
  });
});