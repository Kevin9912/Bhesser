<div id="eliminar_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="title"> Eliminar Clientes </h2>
            </div>
            <div class="modal-body">
                <form method="post">
                <input type="hidden" id="id_client" value="">
                    <h1 class="text-center"> Desea Eliminar al Cliente</h1>
                    <button class="btn btn-primary" type="button" onclick="deleteClient()"> Eliminar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='home_client'"> Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>