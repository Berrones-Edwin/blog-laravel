@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>
                            {{ $post->name }}
                            <a href="{{ route('posts.index') }}" class="float-right btn btn-sm     btn-secondary">Regresar</a>
                        </h5>
                    </div>

                    <div class="card-body">
                        @if($post->file) 
                            @if(preg_match("/https/i", $post->file))
                                <img src="{{ $post->file }}" width="90%"  alt="{{ $post->name }}" class="img-responsive mx-auto">
                            @else
                                <img src='{{ asset("storage") . "/" . $post->file }}' width="90%"  alt="{{ $post->name }}" class="img-responsive mx-auto">
                            @endif
                        @endif
                        <p>
                            {{ $post->excerpt }}
                        </p>
                        <hr>
                        {!! $post->body !!}
                        <hr>
                        <p>
                            <b>Etiquetas</b>
                        </p>
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tag',$tag->slug) }}" class="badge">{{ $tag->name }}</a>
                        @endforeach
                        <p class="float-right">
                            <b>Categoría</b>
                            <a href="{{  route('category',$post->category->slug) }}" class="badge">{{ $post->category->name }}</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
