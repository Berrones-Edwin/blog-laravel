
<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{  old('name',$tag->name ?? '' ) }}" autocomplete="off" placeholder="Nombre">
</div>
<input type="submit" class="btn btn-primary btn-sm float-right" value="Guardar">