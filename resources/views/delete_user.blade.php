<div id="eliminar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="title"> Eliminar Usuario </h2>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="id_user" value="">
                    <h1 class="text-center"> Desea Inhabilitar al Usuario</h1>
                    <h2 class="text-center"> O </h2>
                    <h1 class="text-center"> Desea Eliminar al Usuario</h1>
                    <button class="btn btn-primary" type="button" onclick="deleteUser('ELIMINAR')"> Eliminar </button>
                    <button id="actionstatus" class="btn btn-primary" type="button" onclick="deleteUser('INHABILITAR')"> Inhabilitar </button>
                    <button class="btn btn-danger" type="button" onclick="location.href='home'"> Cancelar </button>
                </form>
            </div>
        </div>
    </div>
</div>