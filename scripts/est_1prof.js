$( document ).ready(function() {
    var materias = [];
    var promedios = [];
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    $("#demo-form").on('submit', function(e) {
        e.preventDefault();
        //obtener elementos seleccionados
        var p = document.getElementById("periodo");
        var periodo = p.options[p.selectedIndex].text;
        var y = document.getElementById("year");
        var year = y.options[y.selectedIndex].text;
        //limpiar
        if(materias.length != 0 && promedios.length != 0){
            materias = [];
            promedios = [];
            $("#divg").empty();
            $("#divg").html('<canvas id="areaChart" style="height:250px"></canvas>');
            areaChartCanvas = $("#areaChart").get(0).getContext("2d");
            areaChart = new Chart(areaChartCanvas);
         }
    
        if(periodo == "Seleccionar" || year == "Seleccionar"){
            alert("Debes seleccionar las dos opciones");
        }else{
            if(periodo != "Seleccionar"){
                if(year != "Seleccionar"){
                if(periodo == "Otoño")
                    periodo = "Otono";
                 $.ajax({	
				    type : 'POST',
				    url  : '../php/est_1prof.php',
                    data: {id:id_profe, periodo: periodo, year:year},
                    dataType: 'json',
				    success :  function(data){						
			            if (data.length != 0){
                            $.each(data, function(index) {
                                materias.push(data[index].nombre);
                                $.ajax({	
				                    type : 'POST',
                                    url  : '../php/est_1prof_avg.php',
                                    data: {id:id_profe, nrc:data[index].nrc},
                                    dataType: 'json',
                                    success :  function(data){						             
                                        $.each(data, function(index) {
                                            promedios.push(parseFloat(data[index].promedio));
                                        });      
                                    },
                                    complete: function (data) {
                                        dibujarChart();
                                    } 
                                }); //2do ajax
                            });
						}else alert("No hay resultados para la búsqueda");
                    }
				}); //1er ajax
            }
        }
     } 
});

function dibujarChart(){
    //--------------
    //- AREA CHART -
    //--------------
    var areaChartData = {
      labels: materias,
      datasets: [
        {
          label: "Promedios",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: promedios
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
    
    }

    });

    