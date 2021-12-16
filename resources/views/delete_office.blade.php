<div id="eliminar_oficina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="title"> Eliminar Oficina </h2>
            </div>
            <div class="modal-body">
                <form method="post">
                <input type="hidden" id="id_office" value="">
                    <h1 class="text-center"> Desea Eliminar la Oficina</h1>
                    <button class="btn btn-primary" type="button" onclick="deleteOffice()"> Eliminar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='home_oficinas'"> Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>