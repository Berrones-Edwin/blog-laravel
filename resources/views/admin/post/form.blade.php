
<div class="form-group">
    
    <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}" autocomplete="off">
</div>
<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" value="{{  old('name',$post->name ?? '' ) }}" autocomplete="off" placeholder="Nombre">
</div>

<h6> Etiquetas</h6>   
<div class="form-group row">
    @foreach($tags as $key => $tag)
        <div class="col-sm-12 col-md-4">
            <input type="checkbox" name="tags[]" 
                    class="" id="{{ $key }}" value="{{ $key }}">
            <label for="{{ $key }}"> {{ $tag }} </label>
        </div>
    @endforeach
  
</div>
<div class="form-group">
    <label for="">Categoria</label>
   <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $key => $category)
            <option  @isset($post){{ $post->category_id == $key ? 'selected' : ''}} @endisset value="{{ $key }}">{{ $category }}</option>
        @endforeach
   </select>
</div>

<div class="form-group">
    <label for="">Extracto</label>
    <!-- excerpt -->
    <textarea class="form-control"  name="excerpt" id="excerpt" cols="30" rows="3">
        {{ old('body',$post->excerpt ?? '') }}
    </textarea>
</div>
<h6>Estado</h6>
<div class="form-group">
    <label for="draft">
        DRAFT
        <input type="radio" value="DRAFT" name="status" id="draft" >
    </label>
    <label for="published">
        PUBLISHED
        <input type="radio" value="PUBLISHED" name="status"  id="published" >
    </label>
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

<input type="submit" class="btn btn-primary btn-sm float-right" value="Guardar">

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function(){

            // editor.ui.view.editable.editableElement.style.height = '300px';
            const body = document.querySelector( '#body' );
           
            ClassicEditor.create( body, {
                    minHeight: '300px',
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Parráfo', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Encabezado 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Encabezado 2', class: 'ck-heading_heading2' }
                        ]
                    }
                })
                .then((data)=>{
                    console.log(data)
                })
                .catch( error => {
                    console.log( error );
                });
            // body.styles.height=400;
            // body.styles.width=100%;

                        
        });
    </script>
@endsection
