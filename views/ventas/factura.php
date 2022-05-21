<div class="modal fade modal-factura" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="row" id="factura">
                <div class="col-md-12 text-center">
                    <h2>Churrasqueria el Chaqueño</h2>
                </div>
                <div class="col-md-6">
                    <p style="margin-bottom: 4px">Avenida de las Americas, Sucre-Bolivia</p>
                    <p style="margin-bottom: 4px">Telefono: 72000000</p>
                    <p style="margin-bottom: 4px">email: el.chaqueño@gmail.com</p>
                </div>
                <div class="col-md-6 text-right datos-factura">
                    <p style="margin-bottom: 4px" id="factura-nro">Nro. 0000043</p>
                    <p style="margin-bottom: 4px" id="factura-serie">Serie 0058</p>
                    <p style="margin-bottom: 4px" id="factura-fecha">Fecha {{getFecha(data.fecha)}}</p>
                    <p style="margin-bottom: 4px" id="factura-hora">Hora {{getHora(data.fecha)}}</p>
                    <p style="margin-bottom: 4px" id="factura-vendedor">Vendedor. {{data.usuario}}</p>
                </div>
                <div class="col-md-12">
                    <h4>Cliente</h4>
                    <div class="message-body">
                        <table class="table table-bordered">
                            <tr>
                                <th id="factura-dni">
                                    DNI. {{data.cliente.dni}}
                                </th>
                            </tr>
                            <tr>
                                <th id="factura-cliente">
                                    Nombre. {{data.cliente.name}} {{data.cliente.lastname}}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Productos</h4>
                    <div class="message-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="factura-productos">
                                <tr>
                                    <td colspan="4" class="text-center"> Cargando...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <table class="table table-bordered totales">
                        <tr>
                            <th>
                                Total
                            </th>
                            <th id="factura-total">
                                0.0
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Descuento
                            </th>
                            <th id="factura-descuento">
                                0.0
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Total a pagar
                            </th>
                            <th id="factura-total-pagar">
                                0.0
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12 text-center mt-7">
                     <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
                     <button class="btn btn-success" id="btnImprimir"><i class="fa fa-print"></i> Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-dialog {
        width: 90%;
        height: 90%;
    }
    .modal-content{
        width: 100%;
        height: 100%;
        padding-left: 3%;
        padding-right: 3%;
    }
    .datos-factura{
        font-weight: bold;
    }
    .totales{
        width: 200px;
        margin: 0 auto;
        float: right;
    }
</style>