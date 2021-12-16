<div id="eliminar_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="title"> Eliminar Proveedor </h2>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="id_proveedor" value="">
                    <h1 class="text-center"> Desea Inhabilitar al Proveedor</h1>
                    <h2 class="text-center"> O </h2>
                    <h1 class="text-center"> Desea Eliminar al Proveedor</h1>
                    <button class="btn btn-primary" type="button" onclick="deleteProveedor('ELIMINAR')"> Eliminar </button>
                    <button id="actionstatus" class="btn btn-primary" type="button" onclick="deleteProveedor('INHABILITAR')"> Inhabilitar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='home_proveedores'"> Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>