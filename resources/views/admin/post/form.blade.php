
<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{  old('name',$post->name ?? '' ) }}" autocomplete="off" placeholder="Nombre">
</div>
<div class="form-group">
    <label for="">Extracto</label>
    <!-- excerpt -->
    <textarea class="form-control"  name="excerpt" id="excerpt" cols="30" rows="3">
        {{ old('body',$post->excerpt ?? '') }}
    </textarea>
</div>
<div class="form-group">
    <label for="">Cuerpo</label>
    <textarea class="form-control"  name="body" id="body" cols="30" rows="10">
        {{ old('body',$post->body ?? '') }}
    </textarea>
</div>
<div class="form-group">
    <label for="">Imagen</label>
    <input type="file" class="form-control" name="file"  autocomplete="off" >
</div>
<div class="form-group">
    <label for="">Categoria</label>
   <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name  }}</option>
        @endforeach
   </select>
</div>
<input type="submit" class="btn btn-primary btn-sm float-right" value="Guardar">