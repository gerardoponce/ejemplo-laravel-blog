@extends('layouts.app')

@section('content')

<div class="container-xl">
	{!! Form::open(['route' => 'writer.articles.store', 'method' => 'POST', 'files' => true]) !!}
	<div class="form-group mt-4">
		<div class="row">
			<div class="form-group col-12 col-sm-6 col-md-3">
				{!! Form::select('category_id', $categories_for_article, NULL, ['placeholder' => 'Escoger categoría', 'class' => 'form-control my-auto']) !!}
			</div>
			<div class="form-group col-6 col-sm-6 col-md-3">
				{!! Form::file('image_path', ['class' => 'form-control-file my-auto']) !!}
			</div>
			<div class="form-group col-6 col-sm-6 col-md-3">
				<div class="form-check">
					{!! Form::radio('published', 1, null, [ 'class' => 'form-check-input', 'id' => 'published-1' ]) !!}
					{!! Form::label('published-1', 'Publicado', [ 'class' => 'form-check-label badge badge-success' ]) !!}
				</div>
				<div class="form-check">
					{!! Form::radio('published', 0, true, [ 'class' => 'form-check-input', 'id' => 'published-2' ]) !!}
					{!! Form::label('published-2', 'No publicado', [ 'class' => 'form-check-label badge badge-warning' ]) !!}
				</div>
			</div>
			<div class="form-group col-12 col-sm-6 col-md-3">
				{!! Form::submit('Guardar artículo', ['class' => 'btn btn-sm btn-info']) !!}
			</div>
		</div>
	</div>
	<div class="form-group">
		{!! Form::text('title', null, ['class' => 'form-control form-control-lg my-2 border-0', 'placeholder' => 'Mi increíble título']) !!}
		{!! Form::text('summary', null, ['class' => 'form-control my-2 border-0', 'placeholder' => 'Mi maravilloso resumen']) !!}
		{!! Form::textarea('text', null, ['id' => 'editor']) !!}
	</div>
{!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/ckeditor/es.js') }}"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			language: 'es'
		} )
		.then( editor => {
			window.editor = editor;
			console.log( 'CKEditor funcionando' );
		} )
		.catch( error => {
			console.error( 'There was a problem initializing the editor.', error );
		} );
</script>
@endsection