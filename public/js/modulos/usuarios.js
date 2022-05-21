var usuarios = (function(window, document){
    var metodos = {

        usuario: null,
        list: [],
        inicio: function(){
            let this_ = this;
            index.get('btnAdd').addEventListener('click', function(evt){
                this_.usuario = null;
                let formulario = index.get('add-usuario');
                formulario.reset();
                formulario.password.disabled = false;
                formulario.email.disabled = false;
                $('.modal-add-usuario').modal('toggle');                    
            });
        	index.get('add-usuario').addEventListener('submit', function(evt){
                evt.preventDefault();
                this_.saveData();                    
            });
            this.getUsuarios();
        },
        getUsuarios: function(){
            $('#dataTables-usuarios').DataTable({
                responsive: true,
                aProcessing: true,
                aServerSide: true,
                language: {
                        url: `${base_url}public/js/datatables/datatables-spanish.json`
                },
                ajax: {
                    "url": base_url+'/usuarios/getData',
                    //"type": "POST", 
                    "dataSrc": ""
                },
                columns: [
                    {"data":"idpersona"},
                    {"data":"idusuarios"},
                    {"data":"nombre"},
                    {"data":"apellido"},
                    {"data":"telefono"},
                    {"data":"email"},
                    {"data":"rol"},
                    {"data": null, render: function(data, type, row, meta){
                        //console.log(data);
                        //console.log(type);
                        //console.log(row);
                        //console.log(meta);
                        return `<button class="btn btn-primary btn-sm" user="${data.idpersona}" onclick="usuarios.editarUsuario(this)"><i class="fa fa-edit"></i> Editar</button>
                        <button class="btn btn-danger ml-1 btn-sm" user="${data.idpersona}" onclick="usuarios.eliminarUsuario(this)"><i class="fa fa-trash"></i> Eliminar</button>`;
                    }}
                ],
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 1 ],
                        "visible": false
                    }
                ],
                buttons:[ 
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: [2,3,4,5,6]
                        }
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf-o"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        exportOptions: {
                            columns: [2,3,4,5,6]
                        }
                    },
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: [2,3,4,5,6]
                        }
                    },
                ], 
                dom: 'lBfrtip<"actions">',
                "resonsivieve": "true",
                "bDestroy": true,
                "iDisplayLength": 10,
                "order": [[0,"desc"]]
            });
        },  
        saveData: function(){
            let this_ = this;
            let formulario = index.get('add-usuario');
            if(formulario.nombre.value.trim() == ''){
                index.msjAdvertencia('¡Nombre de la usuario es requerido!');
                return;
            }
            if(formulario.apellido.value.trim() == ''){
                index.msjAdvertencia('Apellido de la usuario es requerido!');
                return;
            }
            if(formulario.telefono.value.trim() == ''){
                index.msjAdvertencia('Telefono de la usuario es requerido!');
                return;
            }
            if(formulario.rol.value.trim() == ''){
                index.msjAdvertencia('¡Asignar un rol de usuario!');
                return;
            }
            if(this.usuario == null){
                const resValid = index.validarEmail(formulario.email.value.trim())
                if(!resValid.isValid){
                    index.msjAdvertencia(resValid.msg);
                    return;
                }
                if(formulario.password.value.trim() == ''){
                    index.msjAdvertencia('¡La contraseña es requerido!');
                    return;
                }
                if(formulario.password.value.trim().length <= 5){
                    index.msjAdvertencia('¡La contraseña debe ser mayor a seis dígitos!');
                    return;
                }
            }
            var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
                formData.append("nombre", formulario.nombre.value);
                formData.append("apellido", formulario.apellido.value);
                formData.append("telefono", formulario.telefono.value);
                formData.append("rol", formulario.rol.value);
                formData.append("email", formulario.email.value);
                formData.append("password", formulario.password.value);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl;
                if(this.usuario){
                    formData.append("idpersona", this.usuario.idpersona);
                    ajaxUrl = base_url+'/usuarios/editarRegistro';
                }else{
                    ajaxUrl = base_url+'/usuarios/nuevoRegistro';
                }
                request.open("POST", ajaxUrl, true);
                //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        //console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if(objData.estado){
                            index.msjCompletado(objData.msj);
                            this_.getUsuarios();
                            $('.modal-add-usuario').modal('toggle');
                        }else{
                            index.msjError(objData.msj);
                        }
                    }
            }
        },
        editarUsuario: function(item){
            this.usuario = {};
            var idpersona = $(item).attr('user');
            var table = document.getElementById('body-usuarios');
            let formulario = index.get('add-usuario');
            formulario.password.disabled = true;
            formulario.email.disabled = true;

            $('.modal-add-usuario').modal('toggle');  
            var posicion; 

            for (var r = 0, n = table.rows.length; r < n; r++) {
                for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
                    posicion = table.rows[r].cells[c].innerHTML;
                    if(c == 5){
                        if($(posicion).attr('user') == idpersona){
                            this.usuario.nombre = table.rows[r].cells[0].innerHTML;
                            this.usuario.apellido = table.rows[r].cells[1].innerHTML;
                            this.usuario.telefono = table.rows[r].cells[2].innerHTML;
                            this.usuario.email = table.rows[r].cells[3].innerHTML;  
                            this.usuario.rol = table.rows[r].cells[4].innerHTML;                            
                            this.usuario.idpersona = idpersona;
                            //console.log(this.docente);
                            formulario.nombre.value = this.usuario.nombre;
                            formulario.apellido.value = this.usuario.apellido;
                            formulario.telefono.value = this.usuario.telefono;
                            formulario.email.value = this.usuario.email;
                            formulario.rol.value = this.usuario.rol;
                        }
                    }         
                }
            }
        },
        eliminarUsuario: function(elm){
            this.usuario = {};
            var idpersona = $(elm).attr('user');
            let this_ = this;
            Swal.fire({
                title: '¿Seguro que desea eliminar este usuario?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#B3ABAB',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'No Eliminar'
            }).then((result) => {
                if (result.value) {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url+'/usuarios/eliminarRegistro';
                    var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
                    formData.append("idpersona", idpersona);
                    
                    request.open("POST", ajaxUrl, true);
                    request.send(formData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){
                            //console.log(request.responseText);
                            var objData = JSON.parse(request.responseText);
                            if(objData.estado){
                                this_.getUsuarios();
                                index.msjCompletado(objData.msj);
                            }else{
                                index.msjError(objData.msj);
                            }
                        }
                    }
                }
            }); 
        }
     };
     return metodos;
 })(window, document);
 usuarios.inicio();