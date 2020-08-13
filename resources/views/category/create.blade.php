<form action="{{ route('categories.store') }}" method="post">
@csrf
<input class="" type="text" name="name" placeholder="Título">

<input class="" type="text" name="description" placeholder="Descripción">

<button type="submit" class="btn btn-sm">Agregar categoría</button>
</form>