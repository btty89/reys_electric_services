@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3>Productos</h3>
            {{-- <small class="text-muted">Inventario eléctrico</small> --}}
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Nuevo producto
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">

            <form method="GET" action="{{ url('/products') }}">
                <div class="row">

                    <div class="col-md-6">
                        <div class="d-flex gap-2">
                            <input type="text" name="search" class="form-control" placeholder="Buscar producto..."
                                value="{{ request('search') }}">

                            @if (request('search'))
                                <a href="{{ url('/products') }}" class="btn btn-secondary">
                                    Limpiar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead class="table-light">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio compra</th>
                        <th>Precio venta</th>
                        <th>Stock</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <span class="badge bg-dark">
                                    {{ $product->code }}
                                </span>
                            </td>

                            <td>
                                <strong>{{ $product->name }}</strong>
                                @if ($product->description)
                                    <br>
                                    <small class="text-muted">
                                        {{ $product->description }}
                                    </small>
                                @endif
                            </td>

                            <td>
                                @if ($product->unit_type == 'Metro')
                                    <span class="badge bg-info">Metro</span>
                                @else
                                    <span class="badge bg-secondary">Unidad</span>
                                @endif
                            </td>

                            <td>${{ number_format($product->buy_price, 2) }}</td>
                            <td>${{ number_format($product->unit_price, 2) }}</td>

                            <td>
                                @if ($product->stock < 10)
                                    <span class="badge bg-danger">
                                        {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        {{ $product->stock }}
                                    </span>
                                @endif
                            </td>

                            <td class="text-end">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                {{-- DEL --}}
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar producto?')">
                                       <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No hay productos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
@endsection
