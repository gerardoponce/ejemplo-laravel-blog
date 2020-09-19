<section>
    <button type="button" class="{{ $className }}" data-toggle="modal" data-target="#{{ $id }}">
        {{ $buttonName }}
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
                {!! Form::open(['route' => [$route, $id], 'method' => $method]) !!}
                
                    <div class="modal-body">
                        {!! Form::text($textName, $valueName, ['class' => 'form-control my-2', 'placeholder' => $textNamePH]) !!}
                        @if ( $textareaName != Null && $textareaNamePH != Null )
                        {!! Form::textarea($textareaName, $descriptionValue, ['class' => 'form-control my-2', 'placeholder' => $textareaNamePH]) !!}
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cerrar</button>
                        {!! Form::submit($buttonName, ['class' => 'btn btn-sm btn-secondary']) !!}
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
