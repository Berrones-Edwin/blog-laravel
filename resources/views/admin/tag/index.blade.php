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
                    @include('shared.messages')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td width="10px">
                                        <a href="{{ route('tags.show',$tag->slug) }}" class="btn btn-sm btn-secondary">Ver</a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('tags.edit',$tag) }}" class="btn btn-sm btn-warning">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form class="d-inline" action="{{ route('tags.destroy',$tag) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar"  class="btn btn-sm btn-danger"></a>
                                        </form>
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