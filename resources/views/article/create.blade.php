@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'writer.articles.store', 'method' => 'POST', 'files' => true]) !!}
	{!! Form::text('title', null, ['class' => 'form-control border-0']) !!}
	{!! Form::text('excerpt', null, ['class' => 'form-control border-0']) !!}
	{!! Form::file('image_path', []) !!}
	{!! Form::textarea('text', null, ['id' => 'editor']) !!}
	{!! Form::submit('Guardar artículo', []) !!}
{!! Form::close() !!}
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
		} )
		.catch( error => {
			console.error( 'There was a problem initializing the editor.', error );
		} );
</script>
@endsection