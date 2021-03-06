@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Crear Entrada
                        <a href="{{ route('posts.index') }}" class="float-right btn btn-sm     btn-secondary">Regresar</a>
                    </h5>
                </div>

                <div class="card-body">
                    @include('shared.errors')
                   <form action="{{  route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.post.form')
                      
                   </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection