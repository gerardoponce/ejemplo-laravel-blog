@extends('layouts.app')

@section('content')

{!! Form::open([ 'route' => ['writer.articles.update', $article->slug], 'method' => 'PUT', 'files' => true]) !!}
    {!! Form::select('category_id', $categories_for_article, $article->category_id, ['class' => 'form-control']) !!}
    <div>
        <img src="{{ asset($article->image_path) }}" alt="">
    </div>
	{!! Form::text('title', $article->title, ['class' => 'form-control border-0']) !!}
	{!! Form::text('summary', $article->summary, ['class' => 'form-control border-0']) !!}
	{!! Form::file('image_path', []) !!}
	{!! Form::textarea('text', $article->text, ['id' => 'editor']) !!}
	{!! Form::submit('Guardar artículo', ['class' => 'btn btn-sm']) !!}
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