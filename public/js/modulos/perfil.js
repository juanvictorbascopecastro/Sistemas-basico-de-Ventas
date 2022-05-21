var perfil = (function(window, document){
    var metodos = {
        inicio: function(){
            let this_ = this;
        	index.get('edit-usuario').addEventListener('submit', function(evt){
                evt.preventDefault();
                this_.saveData();
            });
            index.get('acceso-usuario').addEventListener('submit', function(evt){
                evt.preventDefault();
                this_.saveAcceso();
            });
        },
        
        saveData: function(){
            let this_ = this;
            let formulario = index.get('edit-usuario');
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
            var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
                formData.append("nombre", formulario.nombre.value);
                formData.append("apellido", formulario.apellido.value);
                formData.append("telefono", formulario.telefono.value);
                formData.append("rol", formulario.rol.value);
                formData.append("idpersona", idpersona);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/usuarios/editarMiPerfil';
                request.open("POST", ajaxUrl, true);
                //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        //console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if(objData.estado){
                            index.msjCompletado(objData.msj);
                            index.get('usuario-nombre').innerHTML = `<i class="fa fa-user mr-4"></i> ${formulario.nombre.value} ${formulario.apellido.value}`;
                        }else{
                            index.msjError(objData.msj);
                        }
                    }
            }
        },
        saveAcceso: function(){
            let this_ = this;
            let formulario = index.get('acceso-usuario');
            const resValid = index.validarEmail(formulario.email.value.trim())
            if(!resValid.isValid){
                index.msjAdvertencia(resValid.msg);
                return;
            }
            if(formulario.password.value.trim() == ''){
                index.msjAdvertencia('¡Ingrese su contraseñá actual!');
                return;
            }
            if(formulario.password.value.trim().length <= 5){
                index.msjAdvertencia('¡La contraseña debe ser mayor a seis dígitos!');
                return;
            }
            if(formulario.password2.value.trim() == ''){
                index.msjAdvertencia('¡Ingrese la nueva contraseñá!');
                return;
            }
            if(formulario.password2.value.trim().length <= 5){
                index.msjAdvertencia('¡La nueva contraseña debe ser mayor a seis dígitos!');
                return;
            }
            var formData = new FormData();
                formData.append("idpersona", idpersona);
                formData.append("email", formulario.email.value);
                formData.append("password2", formulario.password2.value);
                formData.append("password", formulario.password.value);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/usuarios/editarAcceso';
                request.open("POST", ajaxUrl, true);
                //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        //console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if(objData.estado){
                            index.msjCompletado(objData.msj);
                            formulario.password2.value = '';
                            formulario.password.value = '';
                        }else{
                            index.msjError(objData.msj);
                        }
                    }
            }
        }
     };
     return metodos;
 })(window, document);
 perfil.inicio();