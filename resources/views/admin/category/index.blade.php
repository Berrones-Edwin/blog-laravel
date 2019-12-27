@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Listado de Categorias
                        <a href="{{ route('categories.create') }}" class="float-right btn btn-sm     btn-primary">Agregar</a>
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td width="10px">
                                        <a href="{{ route('categories.show',$category->slug) }}" class="btn btn-sm btn-secondary">Ver</a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('categories.edit',$category) }}" class="btn btn-sm btn-warning">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form class="d-inline" action="{{ route('categories.destroy',$category) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar"  class="btn btn-sm btn-danger"></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection