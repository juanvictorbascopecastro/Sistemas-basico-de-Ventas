var index = (function(window, document){
    var metodos = {

        elemento: null,
        table: [],
        docente: {},
        phone_number: null,
        existe_email: false,
        inicio: function(){
            //let this_ = this;
        },
        selectGestion: function(value){
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Home/selectGestion/'+value;
            request.open("POST", ajaxUrl, true);
            //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send();
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    window.location.reload();
                }
            }
        },

        get: function(id){
            return document.getElementById(id);
        },
        getID: function(id){
            this.elemento = document.getElementById(id);
            return this;
        },
        noSubmit: function(elemento){
            if(elemento){
                elemento.addEventListener('submit', function(e){
                    e.preventDefault();
                }, false);
            }
        },

        msjInfo: function(msj){
            //$('#app').removeClass("nav-sm"); // codigo que desplega el menu pequeño 
            //$('#app').addClass("nav-md");
            Swal.fire({ 
                type: 'info',
                title: msj,
                cancelButtonText: 'ACEPTAR'
            });
        },
        msjAdvertencia: function(msj){
            //$('#app').removeClass("nav-sm"); // codigo que desplega el menu pequeño 
            //$('#app').addClass("nav-md");
            Swal.fire({ 
                type: 'warning',
                title: msj,
                cancelButtonText: 'ACEPTAR'
            });
        },
        msjError: function(msj){
            //$('#app').removeClass("nav-sm"); // codigo que desplega el menu pequeño 
            //$('#app').addClass("nav-md");
            Swal.fire({ 
                type: 'error',
                title: 'Advertencia',
                text: msj,
                cancelButtonText: 'ACEPTAR'
            });
        },

        msjCompletado: function(msj){
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: msj,
                showConfirmButton: false,
                timer: 1200
            });
        },
        Toast: function(msj) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        
            Toast.fire({
                icon: 'success',
                title: msj
            });
        },
        isInt: function(x){
            var y = parseInt(x);
            if (isNaN(y)) 
                return false;
            return x == y && x.toString() == y.toString();
        },
        isFloat(num){
            if(num.match(/^-?\d+$/)){
              return true;
            }else if(num.match(/^\d+\.\d+$/)){
              return true;
            }else{
              return false;
            }
        },
        validarEmail(v) {
            const r = {msg: '', isValid: true};
            const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            r.isValid = (pattern.test(v));
            r.msg = (v === '') ? '¡El correo es requerido!' : '¡El correo no es válido!';
            return r;
        },
        getFecha: function(date){
            if(date == null || date == '') return '';
            var hoy = new Date();
            var fecha = new Date(date);
            if(fecha.getDate() == hoy.getDate()){
                return 'Hoy a las '+(fecha.getHours() < 10 ? '0'+fecha.getHours() : fecha.getHours())+':'+(fecha.getMinutes() < 10 ? '0'+fecha.getMinutes() : fecha.getMinutes())+':'+(fecha.getSeconds() < 10 ? '0'+fecha.getSeconds() : fecha.getSeconds());
            }else{
                return (fecha.getDate() < 10 ? '0'+fecha.getDate() : fecha.getDate())+'/'+((fecha.getMonth()+1) < 10 ? '0'+(fecha.getMonth()+1) : (fecha.getMonth()+1))+'/'+fecha.getFullYear()+' '
                +(fecha.getHours() < 10 ? '0'+fecha.getHours() : fecha.getHours())+':'+(fecha.getMinutes() < 10 ? '0'+fecha.getMinutes() : fecha.getMinutes())+':'+(fecha.getSeconds() < 10 ? '0'+fecha.getSeconds() : fecha.getSeconds());
            }
        },
        fecha: function(date){
            var fecha = new Date(date);
            return (fecha.getDate() < 10 ? '0'+fecha.getDate() : fecha.getDate())+'/'+((fecha.getMonth()+1) < 10 ? '0'+(fecha.getMonth()+1) : (fecha.getMonth()+1))+'/'+fecha.getFullYear()
        },
        hora: function(date){
            var fecha = new Date(date);
            return (fecha.getHours() < 10 ? '0'+fecha.getHours() : fecha.getHours())+':'+(fecha.getMinutes() < 10 ? '0'+fecha.getMinutes() : fecha.getMinutes())+':'+(fecha.getSeconds() < 10 ? '0'+fecha.getSeconds() : fecha.getSeconds())
        }
     };
     return metodos;
 })(window, document);
 index.inicio();
