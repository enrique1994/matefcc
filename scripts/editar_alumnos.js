  $( document ).ready(function() {

    $("#form").on('submit', function(e) {
    e.preventDefault();
    var nrc = $('#nrc').val();
    var json = {
    matriculas: [],
    nrc:nrc
    };

    var lines = $('#matriculas').val().split('\n');
   // console.log(lines.length);
for(var i = 0;i < lines.length;i++){
    var item = lines[i];
     json.matriculas.push({ 
        "matricula" : item,
    });
}
//console.log(json);
      $.ajax({	
				type : 'POST',
				url  : '../php/editar_alumnos.php',
                data : json,
				success :  function(data){						
								console.log(data);
                                if (data == 1){
                                alert("Alumno(s) editado(s) correctamente");
                                window.location.replace("../vistas/cursos.php");
                                }
                                if (data == 0)
                                alert("Algo salió mal al editar el/los alumno(s)");
						   }
				});
                
        });
    });

    