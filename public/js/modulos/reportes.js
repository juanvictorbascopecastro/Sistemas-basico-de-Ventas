var reportes = (function(window, document){
    var metodos = {
        list: [],
        inicio: function(){
            this.getGraficaVentas();
            this.getGraficaClientes();
            this.getGraficaProductos();
        },
        getGraficaVentas: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/reportes/getGraficaVentas';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        let mes = [], cantidad = [];
                        for(let i = 0; i < objData.length; i++){
                            mes.push(objData[i].date);
                            cantidad.push(parseFloat(objData[i].cantidad));
                        }
                        this_.viewGrafica3(mes, cantidad);
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        viewGrafica3(mes, cantidad){
            var chart = Highcharts.chart('grafica-ventas-realizadas', {
                title: {
                    text: 'Ventas realizadas de los ultimos 12 meses'
                       },
            
                xAxis: {
                    categories: [mes[0], mes[1], mes[2], mes[3], mes[4], mes[5], mes[6], mes[7], mes[8], mes[9], mes[10], mes[11]]
                },
            
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: cantidad,
                    showInLegend: false
                }]
            
            });
        },
        getGraficaClientes: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/reportes/getClientesFrecuentes';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    //console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        let lista = [], item = [];
                        for(let i = 0; i < objData.length; i++){
                            //item = [objData[i].cliente, parseFloat(objData[i].cantidad)]
                            lista.push({
                                name: objData[i].cliente+' Bs.'+parseFloat(objData[i].total),
                                cantidad: parseFloat(objData[i].cantidad),
                                y: parseFloat(objData[i].total)
                            });
                        }
                        this_.viewGrafica(lista);
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        viewGrafica(lista){
            Highcharts.chart('grafica-clientes', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Clientes mas frecuentes de los ultimos 6 meses'
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.cantidad:.0f} compras <br> {point.y:.1f} Bs.</b>'
                },
                series: [{
                    name: 'Detalles',
                    colorByPoint: true,
                    data: lista
                  }]
            });
        },
        getGraficaProductos: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/reportes/getProductosMasSolicitados';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    //console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    //console.log(objData);
                    if(objData){
                        let lista = [];
                        for(let i = 0; i < objData.length; i++){
                            lista.push({
                                monto: parseFloat(objData[i].total),
                                name: objData[i].producto,
                                y: parseFloat(objData[i].cantidad)
                            });
                            console.log(lista[i].monto);
                        }
                        this_.viewGrafica2(lista);
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        viewGrafica2(lista){
            Highcharts.chart('grafica-productos', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'PRODUCTOS MAS REQUERIDOS'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f} unidades </b><br> Generó <b>{point.monto:.2f} Bs.</b> de Ingreso'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Solicitado',
                    colorByPoint: true,
                    data: lista
                }]
            });
        }
     };
     return metodos;
 })(window, document);
 reportes.inicio();