@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>
                        {{ $category->name}}
                        <a href="{{ route('categories.index') }}" class="float-right btn btn-sm     btn-secondary">Regresar</a>
                    </h5>
                </div>

                <div class="card-body">
                   <p>{{ $category->body }}</p>
                   <p>Slug <b><em>{{ $category->slug }}</em></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection