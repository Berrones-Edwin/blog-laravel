@extends('layouts.app')

@section('content')
    <h1 class="text-center">Listado Articulos</h1>
    @foreach($posts as $post)                   
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">{{ $post->name }}</div>

                        <div class="card-body">
                            @if($post->file) 
                                <img src="{{ $post->file }}" width=300 heigth=300  alt="{{ $post->name }}" class="img-responsive mx-auto">
                            @endif
                            <p>
                                {{ $post->excerpt }}
                            </p>
                            <a href="#" class="btn btn-sm btn-info float-right">
                                Leer más...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $posts->render() }}
@endsection
