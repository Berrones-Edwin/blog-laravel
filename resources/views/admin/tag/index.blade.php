@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Listado de Etiquetas
                        <a href="{{ route('tags.create') }}" class="float-right btn btn-sm     btn-primary">Agregar</a>
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Editar</button>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tags->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection