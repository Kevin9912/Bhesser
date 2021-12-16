<div id="cerrar_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="title"> Cerrar Caja </h2>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="id_caja" value="">
                    <input type="hidden" id="total_close" value="0.00">
                    <h1 class="text-center"> Desea Cerrar la Caja</h1>
                    <div>
                        <p class="" type="text" id="message_close"></p>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onclick="closecaja()"> Cerrar Caja </button>
                <button class="btn btn-danger" type="button" data-dismiss="modal"> Cancelar </button>
            </div>
        </div>
    </div>
</div>