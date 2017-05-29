  $( document ).ready(function() {
        //var idprofesor = "<?php echo $idprofesor; ?>";
          $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
  //  $('#sucess').toggleClass('hidden', !ok);
    $('#error_valid').toggleClass('hidden', ok);
  })
        console.log(idprofesor);
      //obtener datos del profesor
      
      $.ajax({	
				type : 'POST',
				url  : '../php/datos_profesor.php',
                data : {id:idprofesor},
                dataType: 'json',
				success :  function(data){						
							console.log(data);
                                $('#id').append(data.id);
                                $('#nombre').append(data.nombre + " ");
                                $('#nombre').append(data.paterno + " ");
                                $('#nombre').append(data.materno);
                                $('#email').append(data.email);
                                $('#num_cub').append(data.num_cub);
                                $('#ext_tel').append(data.ext_tel);
                                $('#nombre_e').val(data.nombre);
                                $('#paterno_e').val(data.paterno);
                                $('#materno_e').val(data.materno);
                                $('#email_e').val(data.email);
                                $('#password_e').val(data.password);
                                 $('#passworddd').val(data.password);
                                $('#num_cub_e').val(data.num_cub);
                                $('#ext_tel_e').val(data.ext_tel);
                                
						   }
				});

    $("#demo-form").on('submit', function(e) {
    e.preventDefault();
    //var nrc = $('#nrc').val();
     var data = $('#demo-form').serialize();
   // console.log(data);
      $.ajax({	
				type : 'POST',
				url  : '../php/editar_datos_profesor.php',
                data : data + "&id="+idprofesor,
				success :  function(data){						
								console.log(data);
                                if( data == "editado" )
                                alert("Editado correctamente");
                                else
                                alert("Algo salio mal")

                                
						   }
				});
                
        });
    
    });

    