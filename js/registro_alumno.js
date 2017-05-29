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
// + "&moredata=" + morevalue
      $.ajax({	
				type : 'POST',
				url  : '../php/registro_alumno.php',
        data : data,
				success :  function(data)
						   {						
								if(data==1){
                                   
								  //  console.log("ya registrado");
                                    alert("Un alumno ya se ha registrado con esta matricula");

                    				
								}
								else if(data=="registrado")
								{
                                    //console.log("registrado");
                                    alert("Alumno registrado exitosamente");
                 
    
								}
                                else{
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