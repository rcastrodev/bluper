<div class="modal fade" id="modal-update-element">
    <form action="{{ route('category.content.update') }}" method="post" id="form-update-slider" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="color" name="color" class="form-control">
            </div>
            <div class="form-group d-flex">
                <label for="" class="mr-2 mb-0">Es destacada ?</label>
                <input type="checkbox" name="outstanding">
            </div>
            <small>tamaño para la imagen categoria recomendable 288x288px</small>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>        
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>