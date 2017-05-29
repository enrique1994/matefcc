  $( document ).ready(function() {
 
    console.log(idalumno);  
      $.ajax({	
				type : 'POST',
				url  : '../php/getAnunciosAlum.php',
                 data:{id_alumno:idalumno},
                dataType: 'json',
				success :  function(data){						
                                console.log(data);
                                $.each(data, function(index) {
//document.getElementById("anuncios").innerHTML = '<strong>'+data[index].fecha_final+'</strong><br><p>'+
  //                                              data[index].descripcion+'</p>';
  $("#anuncios").append('<b><big>Curso: '+data[index].id_curso+'</big></b><div class="anuncio"><strong>'+data[index].fecha_final+'</strong><br><p>'+
                                               data[index].descripcion+'</p></div>');
                            });
						   }
				});

    
    });