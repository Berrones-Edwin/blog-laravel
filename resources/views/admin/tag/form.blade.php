<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" required value="{{ old('name',$post->name ?? '') }}" autocomplete="off" placeholder="Nombre">
</div>
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" required value="{{ old('slug',$post->slug ?? '') }}" autocomplete="off" placeholder="Slug">
</div>
<div class="form-group">
    <input type="reset" class="btn btn-secondary btn-sm float-left" value="Borrar">
    <input type="submit" class="btn btn-primary btn-sm float-right" value="Guardar">
</div>