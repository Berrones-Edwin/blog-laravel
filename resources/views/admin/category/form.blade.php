
<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{  old('name',$category->name ?? '' ) }}" autocomplete="off" placeholder="Nombre">
</div>
<div class="form-group">
    <label for="">Descripcion</label>
    
    <textarea class="form-control" name="body" id="body" cols="30" rows="10">
        {{  old('body',$category->body ?? '' ) }}
    </textarea>
</div>
<input type="submit" class="btn btn-primary btn-sm float-right" value="Guardar">