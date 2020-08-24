<form action="{{ route('admin.categories.update', ['category' => $category['slug']]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    
            <input class="" type="text" name="name" value="{{ $category->name }}">

            <textarea class="" rows="3" name="description">{{ $category->description }}</textarea>

    </div>
    <div class="">
        <button type="submit" class="btn btn-sm btn-secondary">Agregar categoría</button>
    </div>
</form>  