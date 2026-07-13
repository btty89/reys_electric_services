@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h4>Adicionar Servicio</h4>

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ route('services.store')}}"
        >
            @csrf

             @if (request('return')) 
                    <input type="hidden" name="return" value="{{ request('return') }}">
                @endif
          
            <div class="mb-3">

                <label>Nombre</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"                   
                >

            </div>

            <div class="mb-3">

                <label>Descripción</label>

                <textarea
                    name="description"
                    class="form-control"
                ></textarea>

            </div>

            <div class="mb-3">

                <label>Precio</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"                  
                >

            </div>

            <div class="mt-4 d-flex gap-2">

                <button class="btn btn-primary">

                    Salvar

                </button>

                <a
                    href="{{ route('services.index') }}"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection