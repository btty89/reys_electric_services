@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3>Servicios</h3>
            {{--   <small class="text-muted">Inventario eléctrico</small> --}}
        </div>

        <a href="{{ route('services.create') }}" class="btn btn-primary">
            + Nuevo servicio
        </a>
    </div>



    <div class="card shadow-sm">
        <div class="card-header bg-white">
            {{-- <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar servicio...">
                </div>
            </div>
         --}}
            <form method="GET" action="{{ url('/services') }}">

                <div class="row">

                    <div class="col-md-6">
                        <div class="d-flex gap-2">

                            <input type="text" name="search" class="form-control" placeholder="Buscar servicio..."
                                value="{{ request('search') }}">

                            @if (request('search'))
                                <a href="{{ url('/services') }}" class="btn btn-secondary">
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
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>
                                <strong>{{ $service->name }}</strong>
                                @if ($service->description)
                                    <br>
                                    <small class="text-muted">
                                        {{ $service->description }}
                                    </small>
                                @endif
                            </td>
                            <td>${{ number_format($service->price, 2) }}</td>


                            <td class="text-end">
                                <a href="{{ url('/services/' . $service->id . '/edit') }}" class="btn btn-sm btn-warning">
                                   <i class="bi bi-pencil"></i>
                                </a>
                                
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Eliminar servicio?')">
                                       <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No hay servicios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="pagination-sm">

                {{ $services->links() }}

            </div>

        </div>
    </div>
@endsection
