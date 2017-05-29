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
                                     $("#proflista").append('<li><span id='+data[index].id+' class="text-green" data-toggle="modal" data-target="#myModal" onclick="clickHandler(this);">'+data[index].nombre +' '+data[index].paterno+' '+ data[index].materno+'</span></a></li>');  
                            //          console.log("ño");
                                      
                       
                                        });
                       //console.log("ño2");
						   }
                           
				});

   
    });
function clickHandler(object) {
      
   // alert(object.id);
  var tbody = $("#tbodyid");

 
    $('#myModal').on('show.bs.modal', function (e) {
      
 //$("#asesorias").empty();
 // $('#nombre').text(object.id);
  //$("#tbodyid").empty();
  

  var dias = []; 
                var horas = []; 
                var clases = []; 
 
  $.ajax({	
				type : 'POST',
				url  : '../php/datos_profesor.php',
                dataType: 'json',
                data:{id:object.id},
				success :  function(data){						
						//
                                               $("#tbodyid").html("");
//    tbody.html("");

     tbody.html('<tr id="7"><th>7:00 - 8:00</th><td id="71"></td><td id="72"></td><td id="73"></td><td id="74"></td><td id="75"></td></tr>'
   +'<tr id="8"><th>8:00 - 9:00</th><td id="81"></td><td id="82"></td><td id="83"></td><td id="84"></td><td id="85"></td>></tr>'
   +'<tr id="9"><th>9:00 - 10:00</th><td id="91"></td><td id="92"></td><td id="93"></td><td id="94"></td><td id="95"></td></tr>'
   +'<tr id="10"><th>10:00 - 11:00</th><td id="101"></td><td id="102"></td><td id="103"></td><td id="104"></td><td id="105"></td></tr>'
   +'<tr id="11"><th>11:00 - 12:00</th><td id="111"></td><td id="112"></td><td id="113"></td><td id="114"></td><td id="115"></td></tr>'
   +'<tr id="12"><th>12:00 - 13:00</th><td id="121"></td><td id="122"></td><td id="123"></td><td id="124"></td><td id="125"></td></tr>'
   +'<tr id="13"><th>13:00 - 14:00</th><td id="131"></td><td id="132"></td><td id="133"></td><td id="134"></td><td id="135"></td></tr>'
   +'<tr id="14"><th>14:00 - 15:00</th><td id="141"></td><td id="142"></td><td id="143"></td><td id="144"></td><td id="145"></td></tr>'
   +'<tr id="15"><th>15:00 - 16:00</th><td id="151"></td><td id="152"></td><td id="153"></td><td id="154"></td><td id="155"></td></tr>'
   +'<tr id="16"><th>16:00 - 17:00</th><td id="161"></td><td id="162"></td><td id="163"></td><td id="164"></td><td id="165"></td></tr>'
   +'<tr id="17"><th>17:00 - 18:00</th><td id="171"></td><td id="172"></td><td id="173"></td><td id="174"></td><td id="175"></td>></tr>'
   +'<tr id="18"><th>18:00 - 19:00</th><td><td id="181"></td><td id="182"></td><td id="183"></td><td id="184"></td><td id="185"></td></tr>');
    
                        $('#email').text(data.email);
                        $('#cub').text(data.num_cub);
                        $('#tel').text(data.ext_tel);
     
						   }
                           
				});
 
 $.ajax({	
				type : 'POST',
				url  : '../php/asesorias.php',
                dataType: 'json',
                data:{id:object.id},
				success :  function(data){						
					
       
              
                               

                
                           //console.log(nueve);
                          $.each(data, function(index) {
                            //console.log(data[index]);
                            //var newRowContent = '<tr><td>'+data[index].dia+'</td><td>'+data[index].hora+'</td></tr>';
                            var x = data[index].hora;
                            //console.log(x.charAt(0)+x.charAt(1));
                            //var hora = parseInt(x.charAt(0)+x.charAt(1));
                            //console.log(hora);
                              var x = data[index].hora;
                            //console.log(x.charAt(0)+x.charAt(1));
                            var entero = parseInt(x.charAt(0));
                           // console.log(entero);
                            if( entero == 1 ){
                            var hora1 = x.charAt(0)+x.charAt(1);
                            }
                            else 
                            var hora1 = x.charAt(0);
                            switch (hora1) {
                                case "7":
                                    var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    
                                   // var row = document.getElementById("7");
                                    //var x = row.insertCell(dia);
                                    //x.innerHTML = data[index].tipo;
                                    break;
                                case "8":
                                    var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "9":
                                   var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "10":
                                   var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "11":
                                   var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "12":
                                   var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "13":
                                var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "14":
                                  var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "15":
                                  var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "16":
                                var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "17":
                                var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                case "18":
                                  var dia = data[index].dia;
                                    //console.log(dia);
                                document.getElementById(hora1+dia).innerHTML = data[index].tipo;
                                    break;
                                default:
                                    break;
                            }
                            
            
                       
                                        });

                               
                      


						   }
                           
                           
				});

                            $.ajax({	
				type : 'POST',
				url  : '../php/clases_profesor.php',
                dataType: 'json',
                data:{id:object.id},
				success :  function(data){						
                        //$("#asesorias td").html(""); 
                      //$("#tbodyid").empty();
                           //console.log(nueve);
                          $.each(data, function(index) {
                            //console.log(data[index]);
                            //var newRowContent = '<tr><td>'+data[index].dia+'</td><td>'+data[index].hora+'</td></tr>';
                            var x = data[index].hora;
                            //console.log(x.charAt(0)+x.charAt(1));
                            var entero = parseInt(x.charAt(0));
                           // console.log(entero);
                            if( entero == 1 ){
                            var hora = x.charAt(0)+x.charAt(1);
                            }
                            else 
                            var hora = x.charAt(0);
                            var dia;
                         //   console.log(hora);
                         //   console.log(data[index].dias);
                            switch (data[index].dias) {
                                case "Lunes":
                                    dia = "1";
                                    break;
                                case "Martes":
                                    dia = "2";
                                    break;
                                case "Miercoles":
                                    dia = "3";
                                    break;
                                case "Jueves":
                                    dia = "4";
                                    break;
                                case "Viernes":
                                    dia = "5";
                                    break;
                            
                                default:
                                    break;
                            }
                           
                            //actividades = { "dia":dia, "hora":hora, "clase": data[index].nombre};
                          //  console.log(hora);
                        
                            switch (hora) {
                                case "7":
                                   
                                   document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "8":
                                   
                                  document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "9":
                                   
                                   document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                  
                                    break;
                                case "10":
                                    
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                   
                                    break;
                                case "11":
                                    
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "12":
                                    
                                   document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "13":
                                    
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "14":
                                    
                                   document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "15":
                                    
                                   document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "16":
                                    
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "17":
                                    
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                case "18":
                                   
                                    document.getElementById(hora+dia).innerHTML = data[index].nombre;
                                    break;
                                default:
                                    break;
                            }
                            
            
                       
                                        });
                                       // console.log(clasesp);
						   }
                           
				});

 

})
}
