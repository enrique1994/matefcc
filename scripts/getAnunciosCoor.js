  $( document ).ready(function() {
 
      
      $.ajax({	
				type : 'POST',
				url  : '../php/getAnunciosCoor.php',
                dataType: 'json',
				success :  function(data){						
                                //console.log(data);
                                $.each(data, function(index) {
//document.getElementById("anuncios").innerHTML = '<strong>'+data[index].fecha_final+'</strong><br><p>'+
  //                                              data[index].descripcion+'</p>';
  $("#anuncios").append('<div class="anuncio"><strong>'+data[index].fecha_final+'</strong><br><p>'+
                                               data[index].descripcion+'</p></div>');
                            });
						   }
				});

    
    });

    