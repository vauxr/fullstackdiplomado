@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('producto.index') }}">
                    <div class="card" style="width: 18rem;">
                        <img src="imagenes/Productos.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Productos</p>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
