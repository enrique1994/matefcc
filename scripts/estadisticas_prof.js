 $( document ).ready(function() {
      $.ajax({	
				type : 'POST',
				url  : '../php/todos_profesores.php',
                dataType: 'json',
				success :  function(data){						
						//
                       
                          //console.log(data);
                         // console.log("dddd");
                                     $.each(data, function(index) {
                                       //console.log(data[index]);
                                     $("#proflista").append('<li><a href=estadisticas_1prof.php?id='+data[index].id+'><span id='+data[index].id+' class="text-green">'+data[index].nombre +' '+data[index].paterno+' '+ data[index].materno+'</span></a></li>');  
                            //          console.log("ño");
                                      
                       
                                        });
                       //console.log("ño2");
						   }
                           
				});

   
    });
