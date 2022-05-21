var nuevaventa = (function(window, document){
    var metodos = {
        list_productos: [],
        list_agregados: [],
        cliente: null,
        total: 0,
        descuento: 0,
        inicio: function(){
            let this_ = this;
            this.getCategorias();
            $('#select-categoria').on('change', function() {
                    let idcategoria = this.value;
                    this_.mostrarProductos(idcategoria);
            });
            if(this.list_productos.length == 0) this.getProductos();

            $('#dni').change(function(){
                var dni = index.get('dni').value;
                this_.buscarCliente(dni);
            });
            index.get('btnBuscar').addEventListener('click', function(evt){
                var dni = index.get('dni').value;
                this_.buscarCliente(dni);    
            });
            index.get('form-venta').addEventListener('submit', function(evt){
                evt.preventDefault();
                this_.guardarVenta();                    
            });
            index.get('input-descuento').addEventListener("change", function(event){
                if(this_.descuento >= this_.total){
                    index.msjAdvertencia('¡Descuento inválido!');
                    return;
                }
                this_.descuento = parseFloat(event.target.value);
                index.get('input-total-pagar').value = (this_.total - this_.descuento);
            });
        },
        buscarCliente: function(dni){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/clientes/buscarCliente?dni='+dni+'&request';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        if(objData.idcliente){
                            this_.cliente = {
                                apellido: objData.apellido,
                                dni: objData.dni,
                                idcliente: objData.idcliente,
                                idpersona: objData.idpersona,
                                nombre: objData.nombre,
                                telefono: objData.telefono
                            };
                            this_.cliente = objData;
                            index.get('nombre-cliente').value = objData.nombre+' '+objData.apellido;
                        }else{
                            index.msjAdvertencia(objData.msj);
                            this_.cliente = null;
                            index.get('nombre-cliente').value = '';
                        }
                    }else{
                        index.msjError('¡Ocurrio un error al buscar el cliente!');
                    }
                }
            }
        },
        getCategorias: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/categoria/getData';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        let html = ' <option value="todos">Todos</option>';
                        this_.list_categorias = objData;
                        for(let i = 0; i < objData.length; i++){
                            html = html + `<option value="${objData[i].idcategoria}">${objData[i].nombre}</option>`;
                        }
                        index.get('select-categoria').innerHTML = html;
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        getProductos: function(){
            let this_ = this;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/productos/getData';
            request.open("GET", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData){
                        let html = '';
                        this_.list_productos = objData;
                        this_.mostrarProductos('todos');
                    }else{
                        index.msjError('¡Ocurrio un error al cargar los datos!');
                    }
                }
            }
        },
        idcategoria: 'todos',
        mostrarProductos: function(idcategoria){
            this.mostrarAgregados();
            this.idcategoria = idcategoria;
            let html = '';
            for(let i = 0; i < this.list_productos.length; i++){
                if(this.list_productos[i].idcategoria == idcategoria || idcategoria == 'todos'){

                    let cantidad = this.checkAgregado(this.list_productos[i].idproducto);

                    let stock = this.list_productos[i].stock == 0 ? `<span class="badge bg-danger">${this.list_productos[i].stock - cantidad}</span>` :
                    this.list_productos[i].stock <= 5 ? `<span class="badge bg-warning">${this.list_productos[i].stock - cantidad}</span>` :
                    `<span class="badge bg-primary">${this.list_productos[i].stock - cantidad}</span>`;
                    html = html + `<tr class="odd gradeX">
                        <td>${this.list_productos[i].nombre}</td>
                        <td class="text-center p-0 m-0" style="padding: 0px; text-align: center">
                            <img src="${this.list_productos[i].imagen}" alt="" width="50px" height="50px" class="m-0">
                        </td>
                        <td>Bs.${this.list_productos[i].precio}</td>
                        <td>${stock}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-small btn-sm" prod="${this.list_productos[i].idproducto}" onclick="nuevaventa.agregarALaVenta(this)"><i class="fa fa-plus"></i></button>
                        </td>
                    </tr>`;
                }
            }
            if(html == ''){
                html = `<tr class="odd gradeX">
                            <td colspan="5" class="text-center">¡No hay registros!</td>
                        </tr>`;
            }
            index.get('productos-tabla').innerHTML = html;
        },
        agregarALaVenta: async function(elm){
            var idproducto = $(elm).attr('prod');
            let data = this.list_productos.find(function(element) {
                return element.idproducto === idproducto;
            });
            if(data.stock <= 0){
                index.msjAdvertencia('¡El stock esta en cero de '+data.nombre+'!');
                return;
            }
            let { value: cantidad } = await Swal.fire({
                title: 'Agregar la cantidad de '+data.nombre,
                input: 'number',
                inputLabel: 'Ingresar un número',
                inputPlaceholder: 'ej, 1...',
                inputValue: '1',
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#0d6efd",
                cancelButtonColor: "#bdbdbd",
                confirmButtonText: "Agregar",
                cancelButtonText: "Cancelar",
            });
            if (!cantidad) {
                return;
            }
            if(!index.isInt(cantidad)){
                index.msjAdvertencia('¡La cantidad debe ser un número entero mayor a cero!');
                return;
            }
            cantidad = parseInt(cantidad);
            if(cantidad <= 0){
                index.msjAdvertencia('¡La cantidad a agregar debe ser mayor a cero!');
                return;  
            }
            if(cantidad > data.stock){
                index.msjAdvertencia('¡No hay '+cantidad+' '+data.nombre+' en el stock!');
                return;  
            }
            let agregado = false;
            for(let i = 0; i < this.list_agregados.length; i++){
                if(this.list_agregados[i].idproducto == idproducto){
                    this.list_agregados[i].cantidad = cantidad;
                    this.mostrarProductos(this.idcategoria);
                    agregado = true;
                    break;
                }
            }
            if(!agregado){
                this.list_agregados.push({
                    nombre: data.nombre,
                    precio: data.precio,
                    imagen: data.imagen,
                    idproducto: idproducto,
                    cantidad: cantidad
                });
                this.mostrarProductos(this.idcategoria);
            }
        },
        checkAgregado: function(idproducto){
            for(let i = 0; i < this.list_agregados.length; i++){
                if(this.list_agregados[i].idproducto == idproducto){
                    return this.list_agregados[i].cantidad;
                }
            }
            return 0;
        },
        mostrarAgregados: function(){
            let html = '';
            this.total = 0;
            for(let i = 0; i < this.list_agregados.length; i++){
                html = html + `<tr class="odd gradeX">
                        <td>${this.list_agregados[i].nombre}</td>
                        <td class="text-center p-0 m-0" style="padding: 0px; text-align: center">
                            <img src="${this.list_agregados[i].imagen}" alt="" width="50px" height="50px" class="m-0">
                        </td>
                        <td>Bs. ${this.list_agregados[i].precio}</td>
                        <td>${this.list_agregados[i].cantidad}</td>
                        <td>Bs. ${this.list_agregados[i].cantidad * this.list_agregados[i].precio}</td>
                        <td class="text-center">
                            <button class="btn btn-secondary btn-small btn-sm" onclick="nuevaventa.quitarProducto(${i})"><i class="fa fa-remove"></i></button>
                        </td>
                    </tr>`;
                    this.total = this.total + this.list_agregados[i].cantidad * this.list_agregados[i].precio;
            }
           
            if(html == ''){
                html = `<tr class="odd gradeX">
                            <td colspan="6" class="text-center">¡No hay registros!</td>
                        </tr>`;
            }
            index.get('input-total').value = this.total;
            index.get('input-descuento').value = this.descuento;
            index.get('input-total-pagar').value = this.total - this.descuento;
            index.get('productos-agregado').innerHTML = html;
        },
        quitarProducto: function(index){
            this.list_agregados.splice(index, 1);
            this.mostrarProductos(this.idcategoria);
        },
        guardarVenta(){
            let formulario = index.get('form-venta');
            if(this.cliente == null){
                index.msjAdvertencia('¡Debe asignar el clinete de la venta!');
                return;
            }
            if(this.list_agregados.length <= 0){
                index.msjAdvertencia('¡No agregó ningun producto a la venta!');
                return;
            }
            if(formulario.total.value.trim() == ''){
                index.msjAdvertencia('¡Nombre de la usuario es requerido!');
                return;
            }
            if(formulario.descuento.value.trim() != ''){
                if(!index.isFloat(formulario.descuento.value)){
                    index.msjAdvertencia('¡Descuento debe ser un número real!');
                    return;
                }
                if(parseFloat(formulario.descuento.value) >= this.total){
                    index.msjAdvertencia('¡Descuento no válido!');
                    return;
                }
            }
            if(!index.isFloat(formulario.total_pagar.value)){
                index.msjAdvertencia('Total a pagar debe ser de tipo número!');
                return;
            }
            for(let  i = 0; i < this.list_agregados.length; i++){
                delete this.list_agregados[i].imagen;
            }
            let this_ = this;
            var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
                formData.append("total", formulario.total_pagar.value);
                formData.append("detalle", formulario.detalle.value);
                formData.append("idcliente", this.cliente.idcliente);
                formData.append("productos", JSON.stringify(this.list_agregados));
                formData.append("idusuario", idusuario);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/ventas/agregarRegistro';
                request.open("POST", ajaxUrl, true);
                //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        //console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if(objData.estado){
                            index.msjCompletado(objData.msj);
                            this_.cliente = null;
                            formulario.reset();
                            this_.list_agregados = [];
                            this_.getProductos();
                        }else{
                            index.msjError(objData.msj);
                        }
                    }
                }
        }
     };
     return metodos;
 })(window, document);
 nuevaventa.inicio();