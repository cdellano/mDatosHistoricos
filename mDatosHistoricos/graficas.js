 //var urlBase = "http://localhost:8080/api/";

  $(document).ready(function() {


    /* Se intoducen en una funcion las configuraciones en español de Highcharts
       y mas adelante se llama esta función en cada una de las gráficas.
    */
    function lang(){
        var config;

        config = {
        loading: 'Cargando...',
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        exportButtonTitle: "Exportar",
        printButtonTitle: "Importar",
        rangeSelectorFrom: "Desde",
        rangeSelectorTo: "Hasta",
        rangeSelectorZoom: "Período",
        downloadPNG: 'Descargar imagen PNG',
        downloadJPEG: 'Descargar imagen JPEG',
        downloadPDF: 'Descargar imagen PDF',
        downloadSVG: 'Descargar imagen SVG',
        printChart: 'Imprimir',
        resetZoom: 'Reiniciar zoom',
        resetZoomTitle: 'Reiniciar zoom',
        thousandsSep: ",",
        decimalPoint: '.',
        downloadXLS: "Descargar en Excel",
        downloadCSV: "Descargar en CSV",
        viewData: "Ver tabla de datos",
        viewFullscreen: "Ver en pantalla completa"
      };

      return config;
    }


    /* 
       Se crea una istancia de fecha para llenar automaticamente los valores de fecha inicial y fecha final
       cuando se carga la pagina por primera vez (Actualmente están las fechas fijas, solo hay que descomentarizar las lineas para poner las fechas reales).
       
       *fechaInicio = es la fecha actual menos 7 dias (equivalente a una semana)
       *fechaFin    = es la fecha actual
    */
    var d = new Date();
    var fechaInicio =   "2020-04-01"; //d.getFullYear()  + "-" +  ((d.getMonth()+1) < 10 ? "0"+(d.getMonth()+1) : (d.getMonth()+1))  + "-" + ((d.getDate()-7) < 10 ? "0"+(d.getDate()-7) : (d.getDate()+7));
    var fechaFin    =   "2020-04-30"; //d.getFullYear()  + "-" +  ((d.getMonth()+1) < 10 ? "0"+(d.getMonth()+1) : (d.getMonth()+1))  + "-" + (d.getDate() < 10 ? "0"+(d.getDate()) : (d.getDate()));   


    /*
      Se asignan los valores a los campos via jquery
    */
    $('#finig1').val(fechaInicio);
    $('#fendg1').val(fechaFin);
    $('#finig2').val(fechaInicio);
    $('#fendg2').val(fechaFin);
    $('#finig3').val(fechaInicio);
    $('#fendg3').val(fechaFin);


    // Bloque de código que carga las gráficas al inicar la página.
    g1();
    g2();
    g3();


    // Bloque de código que escucha los clicks vía jquery de cada grafica para ejecutar consultas de graficas individuales.
      $('#sendg1').click(function() {
        g1();
      });
      $('#sendg2').click(function() {
        g2();
      });
      $('#sendg3').click(function() {
        g3();
      });







   //Bloques de código que contienen la lógica de programación de las gráficas.

      function g1(){
            var params = {
              "fini": $('#finig1').val(),
              "fend": $('#fendg1').val(),
              "grafica": "G1"
              };
              
              $.ajax({
              data: params,
              url: 'graficas.php',
              dataType: 'json',
              type: 'post',
              beforeSend: function() {},
              success: function(response) {
                $("#g1").empty();
                
                    Highcharts.chart('g1', {
                    lang: lang(), // Se mandan llamar las configuraciones del lenguaje.
                    chart: {
                      plotBackgroundColor: null,
                      plotBorderWidth: null,
                      plotShadow: false,
                      type: 'pie'
                    },
                    title: {
                      text: 'Casos sospechosos Vs. Casos Positivos.'
                    },
                    tooltip: {
                      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                      point: {
                        valueSuffix: '%'
                      }
                    },
                    plotOptions: {
                      pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                          enabled: true,
                          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                      }
                    },
                    series: [{
                      name: 'Porcentaje',
                      colorByPoint: true,
                      data: response
                    }]
                  });
              }
            });
      }

      function g2(){
        var params = {
          "fini": $('#finig2').val(),
          "fend": $('#fendg2').val(),
          "grafica": "G2"
        };
        $.ajax({
          data: params,
          url: 'graficas.php',
          dataType: 'json',
          type: 'post',
          beforeSend: function() {
  
          },
          success: function(response) {
            $("#g2").empty();
            
            Highcharts.chart('g2', {
              lang: lang(), // Se mandan llamar las configuraciones del lenguaje.
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'bar'
              },
              title: {
              text: 'Pacientes COVID-19 positivos por fechas.'
              },
              subtitle: {
              text: 'Fuente: Base de datos de Secretaría de Salud.'
              },
              yAxis: {
              title: {
              text: 'Cantidad Casos'
              }
              },
              legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
              },
              xAxis:{
              categories: response.X
              },
              series: [{
              name: 'Casos',   
              data: response.Y,
              color:'#f50'
              }] 
            });            
          }  
        });
      }


      function g3(){
        var params = {
          "fini": $('#finig3').val(),
          "fend": $('#fendg3').val(),
          "grafica": "G3"
        };
        $.ajax({
          data: params,
          url: 'graficas.php',
          dataType: 'json',
          type: 'post',
          beforeSend: function() {
  
          },
          success: function(response) {
            $("#g3").empty();
            
            Highcharts.chart('g3', {
              lang: lang(), // Se mandan llamar las configuraciones del lenguaje.
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'line'
              },
              title: {
              text: 'Pacientes COVID-19 positivos por fechas.'
              },
              subtitle: {
              text: 'Fuente: Base de datos de Secretaría de Salud.'
              },
              yAxis: {
              title: {
              text: 'Cantidad Casos'
              }
              },
              legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
              },
              xAxis:{
              categories: response.X
              },
              series: [{
              name: 'Casos',   
              data: response.Y,
              color:'#f50'
              }] 
            });
  
          }  
        });
      }





  });