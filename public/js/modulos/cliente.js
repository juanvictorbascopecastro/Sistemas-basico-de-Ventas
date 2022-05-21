var clientes = (function (window, document) {
  var metodos = {
    cliente: null,
    list: [],
    phone_number: null,
    dataTableCliente: {},
    inicio: function () {
      let this_ = this;
      index.get("btnAdd").addEventListener("click", function (evt) {
        index.get("add-cliente").reset();
        this_.cliente = null;
        $(".modal-add-cliente").modal("toggle");
      });
      index.get("add-cliente").addEventListener("submit", function (evt) {
        evt.preventDefault();
        this_.saveData();
      });
      this.getClientes();
      this.phone_number = window.intlTelInput(
        document.querySelector("#telephone"),
        {
          initialCountry: "BO",
          //allowDropdown: true, // el select se va al lado derecho
          //autoHideDialCode: true,
          //autoPlaceholder: "off",
          //dropdownContainer: "body",
          //excludeCountries: ["us"],
          //formatOnDisplay: false,
          preferredCountries: ["es"],
          hiddenInput: "full",
          geoIpLookup: function (callback) {
            $.get("http://ipinfo.io", function () {}, "jsonp").always(function (
              resp
            ) {
              var countryCode = resp && resp.country ? resp.country : "";
              callback(countryCode);
            });
          },
          //hiddenInput: "full_number",
          // initialCountry: "auto",
          //nationalMode: false,
          //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
          //placeholderNumberType: "MOBILE",
          // preferredCountries: ['cn', 'jp'],
          separateDialCode: true,
          // utilsScript is useful for providing validation and pretty formatting
          utilsScript: base_url + "public/js/utils.min.js",
        }
      );
    },
    getClientes: function () {
      let this_ = this;
      this.dataTableCliente = $("#dataTables-cliente").DataTable({
        language: {
          url: `${base_url}public/js/datatables/datatables-spanish.json`,
        },
        ajax: {
          url: base_url + "/cliente/getData",
          //"type": "POST",
          dataSrc: "",
        },
        columns: [
          { data: "idcliente" },
          { data: "idpersona" },
          { data: "nombre" },
          { data: "apellido" },
          { data: "telefono" },
          { data: "dni" },
          {
            data: null,
            render: function (data, type, row, meta) {
              //console.log(data);
              //console.log(type);
              //console.log(row);
              //console.log(meta);
              return `<button class="btn btn-primary btn-sm" cli="${data.idpersona}" onclick="clientes.editarCliente(this)"><i class="fa fa-edit"></i> Editar</button>
                        <button class="btn btn-danger ml-1 btn-sm" cli="${data.idpersona}" onclick="clientes.eliminarCliente(this)"><i class="fa fa-trash"></i> Eliminar</button>`;
            },
          },
        ],
        columnDefs: [
          {
            targets: [0],
            visible: false,
            searchable: false,
          },
          {
            targets: [1],
            visible: false,
            searchable: false,
          },
        ],
        buttons: [
          {
            extend: "excelHtml5",
            text: '<i class="fa fa-file-excel-o"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-success",
            exportOptions: {
              columns: [2, 3, 4, 5],
            },
          },
          {
            extend: "pdfHtml5",
            text: '<i class="fa fa-file-pdf-o"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-danger",
            exportOptions: {
              columns: [2, 3, 4, 5],
            },
          },
          {
            extend: "print",
            text: '<i class="fa fa-print"></i> ',
            titleAttr: "Imprimir",
            className: "btn btn-info",
            exportOptions: {
              columns: [2, 3, 4, 5],
            },
          },
        ],
        //responsive: "true",
        //dom: 'Bfrtilp',
        //"bPaginate": true,
        //"bInfo": true,
        dom: 'lBfrtip<"actions">',
        //"sPaginationType": "bootstrap", // full_numbers
        //"sDom": "lfrti"
        //"bDestroy": true,
        //scrollx: true,
        //"iDisplayLength": 10,
        //"order": [[0,"desc"]]
      });
    },
    saveData: function () {
      let this_ = this;
      let formulario = index.get("add-cliente");
      if (formulario.nombre.value.trim() == "") {
        index.msjAdvertencia("¡Nombre de la cliente es requerido!");
        return;
      }
      if (formulario.apellido.value.trim() == "") {
        index.msjAdvertencia("Apellido de la cliente es requerido!");
        return;
      }
      if (formulario.telefono.value.trim() == "") {
        index.msjAdvertencia("Telefono de la cliente es requerido!");
        return;
      }
      if (formulario.dni.value.trim() == "") {
        index.msjAdvertencia("¡DNI de la cliente es requerido!");
        return;
      }
      var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
      formData.append("nombre", formulario.nombre.value);
      formData.append("apellido", formulario.apellido.value);
      formData.append("telefono", formulario.telefono.value);
      formData.append("dni", formulario.dni.value);
      var request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
      var ajaxUrl;
      if (this.cliente) {
        formData.append("idpersona", this.cliente.idpersona);
        ajaxUrl = base_url + "/clientes/editarRegistro";
      } else {
        ajaxUrl = base_url + "/clientes/nuevoRegistro";
      }
      request.open("POST", ajaxUrl, true);
      //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send(formData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          //console.log(request.responseText);
          var objData = JSON.parse(request.responseText);
          if (objData.estado) {
            index.msjCompletado(objData.msj);
            //this_.getClientes();
            this_.dataTableCliente.ajax.reload(function () {});
            $(".modal-add-cliente").modal("toggle");
          } else {
            index.msjError(objData.msj);
          }
        }
      };
    },
    editarCliente: function (item) {
      this.cliente = {};
      $(".modal-add-cliente").modal("toggle");
      let formulario = index.get("add-cliente");

      var idpersona = $(item).attr("cli");
      var table = document.getElementById("body-cliente");

      var posicion;

      for (var r = 0, n = table.rows.length; r < n; r++) {
        for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
          posicion = table.rows[r].cells[c].innerHTML;
          if (c == 4) {
            if ($(posicion).attr("cli") == idpersona) {
              this.cliente.nombre = table.rows[r].cells[0].innerHTML;
              this.cliente.apellido = table.rows[r].cells[1].innerHTML;
              this.cliente.telefono = table.rows[r].cells[2].innerHTML;
              this.cliente.dni = table.rows[r].cells[3].innerHTML;
              this.cliente.idpersona = idpersona;
              //console.log(this.docente);
              formulario.nombre.value = this.cliente.nombre;
              formulario.apellido.value = this.cliente.apellido;
              formulario.telefono.value = this.cliente.telefono;
              formulario.dni.value = this.cliente.dni;
            }
          }
        }
      }
    },
    eliminarCliente: function (item) {
      var idpersona = $(item).attr("cli");
      let this_ = this;
      Swal.fire({
        title: "¿Seguro que desea eliminar el cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#B3ABAB",
        confirmButtonText: "Eliminar",
        cancelButtonText: "No Eliminar",
      }).then((result) => {
        if (result.value) {
          var request = window.XMLHttpRequest
            ? new XMLHttpRequest()
            : new ActiveXObject("Microsoft.XMLHTTP");
          var ajaxUrl = base_url + "/clientes/eliminarRegistro";
          var formData = new FormData(); // objeto ya declarado para ajax sentencia creada por
          formData.append("idpersona", idpersona);

          request.open("POST", ajaxUrl, true);
          request.send(formData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              //console.log(request.responseText);
              var objData = JSON.parse(request.responseText);
              if (objData.estado) {
                this_.getClientes();
                index.msjCompletado(objData.msj);
              } else {
                index.msjError(objData.msj);
              }
            }
          };
        }
      });
    },
  };
  return metodos;
})(window, document);
clientes.inicio();
