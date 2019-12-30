@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1 class="text-center">Listado Articulos</h1>
    @foreach($posts as $post)                   
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header"><b>{{ $post->name }}</b></div>

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
                            <a href="{{ route('post',$post->slug) }}" class="btn btn-sm btn-primary float-right">
                                Leer más...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endforeach
    {{ $posts->render() }}
@endsection
