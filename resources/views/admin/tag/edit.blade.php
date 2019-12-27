@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Crear etiqueta
                        <a href="{{ route('tags.index') }}" class="float-right btn btn-sm     btn-secondary">Regresar</a>
                    </h5>
                </div>

                <div class="card-body">
                    @include('shared.errors')
                   <form action="{{ route('tags.update',$tag) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('admin.tag.form')
                   </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection