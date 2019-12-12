@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>
                            {{ $post->name }}
                        </h2>
                    </div>

                    <div class="card-body">
                        @if($post->file) 
                            <img src="{{ $post->file }}" width="90%"  alt="{{ $post->name }}" class="img-responsive mx-auto">
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
