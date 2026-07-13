@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h3 class="mb-4">🧾 Editar Orçamento</h3>

        <input type="text" id="customer" class="form-control mb-3" value="{{ $order->customer }}" placeholder="Cliente">

        <h4>Productos</h4>

        <input type="text" id="search" class="form-control mb-2" placeholder="Buscar producto...">

        <div id="results" class="list-group mb-3"></div>

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

        <h5 class="fw-bold text-end mb-3">
            Total: $<span id="total">0</span>
        </h5>

        <h4>Servicios</h4>

        <input type="text" id="search-services" class="form-control mb-2" placeholder="Buscar servicio...">

        <div id="results-services" class="list-group mb-3"></div>

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

        <h5 class="fw-bold text-end">
            Total: $<span id="total-services">0</span>
        </h5>

        <div class="d-flex justify-content-end gap-2 mt-4">

            <button class="btn btn-primary" onclick="updateOrder()">
                Actualizar
            </button>

            <button class="btn btn-secondary" onclick="window.location.href='{{ route('orders.index') }}'">
                Cancelar
            </button>

        </div>

    </div>

    <script>
       //const order = @json($order);
       window.orderEdit = @json($order);
        //console.log(order);

      /*   window.addEventListener('DOMContentLoaded', () => {

            // PRODUCTOS

            order.order_products.forEach(item => {

                addProduct(

                    item.product.id,

                    item.product.name,

                    item.price,

                    item.quantity

                );

            });

            // SERVICIOS

            order.order_services.forEach(item => {

                 cartServices.push({
                    id: item.service.id,
                    name: item.service.name,
                    price: parseFloat(item.price),
                    quantity: item.quantity

                });

            });

            render();

        });

        function updateOrder() {
            let data = {

                customer: document.getElementById('customer').value,

                products: products,

                services: services
            };

            fetch(`/orders/${order.id}`, {

                    method: 'PUT',

                    headers: {

                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },

                    body: JSON.stringify(data)

                })
                .then(res => res.json())
                .then(() => {

                    window.location.href = '/orders';

                });

        } */
    </script>
@endsection
