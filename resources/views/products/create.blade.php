@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">

        <div class="card-header bg-white">

            <h4>Adicionar Produto</h4>

        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('products.store') }}">

                @csrf
                @if (request('return')) 
                    <input type="hidden" name="return" value="{{ request('return') }}">
                @endif

                <div class="mb-3">

                    <label>Nombre</label>

                    <input type="text" name="name" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Descripcion</label>

                    <textarea name="description" class="form-control"></textarea>

                </div>

                <div class="mb-3">

                    <label>Tipo</label>

                    <select name="unit_type" class="form-control">

                        <option value="Unidad">
                            Unidad
                        </option>

                        <option value="Metro">
                            Metro
                        </option>

                    </select>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <label>Precio de Compra</label>

                        <input type="number" step="0.01" name="buy_price" class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>Precio de Venta</label>

                        <input type="number" step="0.01" name="unit_price" class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>Stock</label>

                        <input type="number" name="stock" class="form-control">

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <button class="btn btn-primary">

                        Salvar

                    </button>

                    <a href="{{ url('/products') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
