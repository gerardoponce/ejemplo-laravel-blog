
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Categoría nueva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="modal-body">
                
                        <input class="" type="text" name="name" placeholder="Título">
                        
                        <input class="" type="text" name="description" placeholder="Descripción">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-secondary">Agregar categoría</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>  
        </disv>
    </div>
</div>
