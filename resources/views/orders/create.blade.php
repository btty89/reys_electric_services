@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h3 class="mb-4">🧾 Crear Orçamento</h3>
        <input type="text" placeholder="Cliente" class="form-control mb-3" id="customer">
        <h4>Productos</h4>

        <div class="d-flex justify-content-between align-items-center mb-3">
            {{-- 🔎 SEARCH --}}
            <div class="col-md-10">
                <input type="text" id="search" class="form-control" placeholder="Buscar producto...">
            </div>

            <a href="{{ route('products.create', ['return' => 'order']) }}" class="btn btn-primary">
                + Producto
            </a>
        </div>


        <div id="results" class="list-group mb-3"></div>

        {{-- 🧾 TABLE --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="cart"></tbody>
        </table>

        <h5 class="fw-bold text-end mb-3">Total: $<span id="total">0</span></h5>

        {{-- Servicios --}}
        <h4>Servicios</h4>
        <div class="d-flex justify-content-between align-items-center mb-3">
            {{-- 🔎 SEARCH --}}
            <div class="col-md-10">
                <input type="text" id="search-services" class="form-control" placeholder="Buscar servicio...">
            </div>
            <a href="{{ route('services.create', ['return' => 'order']) }}" class="btn btn-primary">
                + Servicio
            </a>
        </div>

        <div id="results-services" class="list-group mb-3"></div>

        {{-- 🧾 TABLE --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Desconto %</th>
                    <th>Subtotal</th>
                    <th></th>

                </tr>
            </thead>

            <tbody id="cart-services"></tbody>
        </table>

        <h5 class="fw-bold text-end">Total: $<span id="total-services">0</span></h5>


        <div class="d-flex justify-content-end gap-2 mt-4">
            <button class="btn btn-primary" onclick="saveOrder()">
                Guardar
            </button>

            <button class="btn btn-secondary" onclick="window.location.href='{{ route('orders.index') }}'">
                Cancelar
            </button>
        </div>

    </div>
@endsection
