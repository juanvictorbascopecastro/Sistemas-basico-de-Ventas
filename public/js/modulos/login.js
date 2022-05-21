var login = (function(window, document){
    var metodos = {
        inicio: function(){
            let this_ = this;
        	index.get('login-form').addEventListener('submit', function(evt){
                evt.preventDefault();
                this_.login();
            });
        },
        
        login: function(){
            let this_ = this;
            let formulario = index.get('login-form');
            if(formulario.email.value.trim() == ''){
                index.msjAdvertencia('¡El correo es requerido!');
                return;
            }
            if(formulario.password.value.trim() == ''){
                index.msjAdvertencia('¡La contraseña de usuario es requerido!');
                return;
            }

            var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
                formData.append("email", formulario.email.value);
                formData.append("password", formulario.password.value);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/login/loginUsuario';
                request.open("POST", ajaxUrl, true);
                //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        //console.log(request.responseText);
                        var objData = JSON.parse(request.responseText);
                        if(objData.estado){
                            window.location = base_url+'/home';
                            //index.msjCompletado(objData.msj);
                        }else{
                            index.msjError(objData.msj);
                        }
                    }
                }
        },
     };
     return metodos;
 })(window, document);
 login.inicio();