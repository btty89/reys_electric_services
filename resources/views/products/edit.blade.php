@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h4>Editar Produto</h4>

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ url('/products/' . $product->id) }}"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nome</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ $product->name }}"
                >

            </div>

            <div class="mb-3">

                <label>Descrição</label>

                <textarea
                    name="description"
                    class="form-control"
                >{{ $product->description }}</textarea>

            </div>

            <div class="mb-3">

                <label>Tipo</label>

                <select
                    name="unit_type"
                    class="form-control"
                >

                    <option
                        value="Unidad"
                        {{ $product->unit_type == 'Unidad' ? 'selected' : '' }}
                    >
                        Unidad
                    </option>

                    <option
                        value="Metro"
                        {{ $product->unit_type == 'Metro' ? 'selected' : '' }}
                    >
                        Metro
                    </option>

                </select>

            </div>

            <div class="row">

                <div class="col-md-4">

                    <label>Preço Compra</label>

                    <input
                        type="number"
                        step="0.01"
                        name="buy_price"
                        class="form-control"
                        value="{{ $product->buy_price }}"
                    >

                </div>

                <div class="col-md-4">

                    <label>Preço Venda</label>

                    <input
                        type="number"
                        step="0.01"
                        name="unit_price"
                        class="form-control"
                        value="{{ $product->unit_price }}"
                    >

                </div>

                <div class="col-md-4">

                    <label>Stock</label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        value="{{ $product->stock }}"
                    >

                </div>

            </div>

            <div class="mt-4 d-flex gap-2">

                <button class="btn btn-primary">

                    Atualizar

                </button>

                <a
                    href="{{ url('/products') }}"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection