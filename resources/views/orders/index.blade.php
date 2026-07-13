@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3>Orçamentos</h3>
            {{-- <small class="text-muted">Lista de orçamentos</small> --}}
        </div>

        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            + Nuevo orçamento
        </a>
    </div>

    <div class="card shadow-sm">
        {{--  <div class="card-header bg-white">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar orçamento...">
                </div>
            </div>
        </div> --}}
        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total Productos</th>
                        <th>Total Servicios</th>
                        <th>Total</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->customer }}</td>
                            <td>${{ number_format($order->total_products, 2) }}</td>
                            <td>${{ number_format($order->total_services, 2) }}</td>
                            <td>
                                <span class="badge bg-dark">
                                    ${{ number_format($order->total, 2) }}
                                </span>

                            </td>
                            <td class="text-end">

                                <a href="{{ route('orders.pdf', $order->id) }}" target="_blank" class="btn btn-sm btn-secondary">
                                    <i class="bi-filetype-pdf"></i>
                                </a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar orçamento?')">
                                       <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                                {{-- <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button> --}}

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No hay orçamentos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
@endsection
