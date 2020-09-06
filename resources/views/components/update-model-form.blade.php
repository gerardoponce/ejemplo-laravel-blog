<section>
    
{!! Form::open([ 'route' => ['admin.categories.update', $category->slug], 'method' => 'PUT']) !!}

    <div class="modal-body">
        {!! Form::text($textName, Null, ['class' => 'form-control', 'placeholder' => $textNamePH]) !!}
        @if ( $textareaName != Null && $textareaNamePH != Null )
        {!! Form::textarea($textareaName, Null, ['class' => 'form-control', 'placeholder' => $textareaNamePH]) !!}
        @endif
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cerrar</button>
        {!! Form::submit('Agregar ' . $modelName, ['class' => 'btn btn-sm btn-secondary']) !!}
    </div>
    
{!! Form::close() !!}

</section>
