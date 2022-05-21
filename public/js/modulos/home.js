var home = (function(window, document){
    var metodos = {
        inicio: function(){
            this.getGraficaVentas();
        },
        getGraficaVentas: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/reportes/getGraficaGanacias';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        let mes = [], totals = [];
                        for(let i = 0; i < objData.length; i++){
                            mes.push(objData[i].date);
                            if(objData[i].total != null) totals.push(parseFloat(objData[i].total));
                            else totals.push(0.0);
                        }
                        this_.viewGrafica(mes, totals);
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        viewGrafica(mes, totals){
            var chart = Highcharts.chart('grafica-ventas-ganacia', {
                title: {
                    text: 'Ingresos los ultimos 12 meses'
                },
                xAxis: {
                    categories: [mes[0], mes[1], mes[2], mes[3], mes[4], mes[5], mes[6], mes[7], mes[8], mes[9], mes[10], mes[11]]
                },
                plotOptions: {
                    series: {
                      borderWidth: 0,
                      dataLabels: {
                        enabled: true,
                        format: 'Bs. {point.y:.1f}'
                      }
                    }
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: totals,
                    showInLegend: false,
                    name: 'Bs.'
                }],
            });
        },
     };
     return metodos;
 })(window, document);
 home.inicio();