<section>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $id }}">
        Crear categoría
    </button>
    
    {{-- Modal --}}
    <div class="modal fade" id="{{ $id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">{{ $modalTitle }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST']) !!}
                
                    <div class="modal-body">
                    
                    {!! Form::text($name=$textName, null, ['class' => 'form-control', 'placeholder' => $textNamePH]) !!}
                    {!! Form::textarea($name=$textareaName, null, ['class' => 'form-control', 'placeholder' => $textareaNamePH]) !!}
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cerrar</button>
                        {!! Form::submit($text='Agregar ' . $modelName, ['class' => 'btn btn-sm btn-secondary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
