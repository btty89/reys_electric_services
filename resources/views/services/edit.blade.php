@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h4>Editar Servicio</h4>

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ route('services.update', $service->id) }}"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nome</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ $service->name }}"
                >

            </div>

            <div class="mb-3">

                <label>Descrição</label>

                <textarea
                    name="description"
                    class="form-control"
                >{{ $service->description }}</textarea>

            </div>

            <div class="mb-3">

                <label>Preço</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    class="form-control"
                    value="{{ $service->price }}"
                >

            </div>

            <div class="mt-4 d-flex gap-2">

                <button class="btn btn-primary">

                    Atualizar

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