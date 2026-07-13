<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            /* border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            font-size: 13px;
            height: 8px;
            text-align: left; */
            background: #e5e5e5;
            color: #222;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            font-size: 13px;
            height: 25px;
            text-align: left;
            padding-left: 5px;
        }

        td {
            /*  border: 1px solid #000; */
            /*  background: #f2f2f2;
            font-size: 12px;
            height: 20px;
            border-bottom: 1px solid #ccc;*/
            /* background: #f2f2f2; */
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            font-size: 12px;
            height: 11px;

        }


        th:first-child {

            border-left: 1px solid #000;
        }

        th:last-child {

            border-right: 1px solid #000;
        }

        td:first-child {

            border-left: 1px solid #ccc;
        }

        td:last-child {

            border-right: 1px solid #ccc;

        }

        tbody tr:nth-child(even) {

            background-color: #f2f2f2;
        }

        h5 {
            margin: 10px 0 5px 0;
        }
    </style>

    <table width="100%"
        style="
        border: 1px solid #4a4848;
        margin-bottom: 20px;
        border-collapse: collapse;
    ">

        <tr>

            {{-- LOGO --}}
            <td
                style="
                width: 20%;
               
                text-align: center;
                border-right: 1px solid #000;
                vertical-align: top;
            ">
                <img src="{{ public_path('img/logo.jpeg') }}"
                    style="
        width: 100%;
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
    ">
            </td>

            {{-- DATOS EMPRESA --}}
            <td
                style="
                width: 80%;
                padding: 5px;
                vertical-align: top;
            ">

                <h2 style="margin:0 0 10px 0;">
                    Rey Diaz Serviços Elétricos
                </h2>

                {{-- propietario + telefono --}}
                <p style="margin:3px 0;">
                    <strong>Proprietário:</strong> Rey Diaz
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <strong>Telefone:</strong> +55 (15)996812651
                </p>

                {{-- direccion agrupada --}}
                <p style="margin:3px 0;">
                    <strong>Rua:</strong> Rua Marechal Deodoro
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <strong>Número:</strong> 69
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <strong>Bairro:</strong> Vila Sá
                </p>

                {{-- municipio + estado --}}
                <p style="margin:3px 0;">
                    <strong>Município:</strong> Ourinhos
                    &nbsp;&nbsp; | &nbsp;&nbsp;
                    <strong>Estado:</strong> São Paulo
                </p>
                <div style="
        border-top:1px dotted #999;
        margin:8px 0;
    "></div>

                <div style="text-align:left;">
                    <h1
                        style="
                        margin:0;
                        color:#333;
                        font-size:15px;
                    ">
                        ORÇAMENTO
                    </h1>

                    <p style="margin:5px 0;">
                        <strong>Nº:</strong> {{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                    </p>

                    <p style="margin:5px 0;">
                        <strong>Data:</strong>
                        {{ $order->created_at->format('d/m/Y') }}
                    </p>
                </div>
            </td>

        </tr>


    </table>


    <table style="
        width:100%;
        margin-bottom:15px;
        border:1px solid #ccc;
    ">
        <tr>
            <td style="padding:8px;">
                <strong>Cliente:</strong>
                {{ $order->customer }}
            </td>
        </tr>
    </table>

</head>

<body>

    @if ($order->orderProducts->count() > 0)

        {{--  <h5>Produtos</h5> --}}

        <table>

            <tr>
                {{--  <th style="width: 65px;">Código</th> --}}
                <th>Produtos</th>
                <th style="width:70px;">Quantidade</th>
                <th style="width: 78px;">V. Unitário</th>
                <th style="width: 50px;">V.Total</th>
            </tr>

            @foreach ($order->orderProducts as $item)
                <tr>
                    {{-- <td>{{ $item->product->code }}</td> --}}
                    <td>{{ $item->product->name }}<br>{{ $item->product->description }}</td>
                    <td style="text-align:center;font-weight: bold;">{{ $item->quantity }}</td>
                    <td style="text-align:center">${{ $item->price }}</td>
                    <td>${{ $item->subtotal }}</td>
                </tr>
            @endforeach

            {{-- FILA TOTAL --}}
            <tr>
                <td colspan="3" style="text-align:right; font-weight:bold;">

                </td>

                <td
                    style="
            font-weight: bold;
            border: 1px solid #000;
            text-align: right;
        ">
                    R${{ number_format($order->total_products, 2, ',', '.') }}
                </td>
            </tr>

        </table>
        {{-- <h5 style="font-weight: bold; text-align: right; margin-bottom: 5px;">
        Total Produtos: R${{ $order->total_products }}
    </h5> --}}

    @endif
    {{--   <h5>Servicios</h5> --}}

    @if ($order->orderServices->count() > 0)
        <table style="margin-top: 15px">

            <thead>
                <tr>

                    <th>Serviços</th>
                    <th style="width:75px;">Quantidade</th>
                    <th style="width: 78px;">V. Unitário</th>
                     <th style="width: 50px;">Desc.%</th>
                    <th style="width: 50px;">V.Total</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($order->orderServices as $item)
                    <tr>

                        <td>
                            {{ $item->service->name }}<br>{{ $item->service->description }}
                        </td>

                        <td style="text-align:center;font-weight: bold;">{{ $item->quantity }}</td>
                        <td style="text-align:center">${{ $item->price }}</td>
                        <td style="text-align:center">{{ number_format($item->discount_percent, 0, ',', '.') }}%</td>
                        <td style="text-align:right">${{ $item->subtotal }}</td>

                    </tr>
                @endforeach

                {{-- FILA TOTAL --}}
                <tr>

                    <td colspan="4" style="text-align: right; font-weight: bold;">
                    </td>

                    <td
                        style="
                font-weight: bold;
                border: 1px solid #000;
                text-align: right;
            ">
                        R${{ $order->total_services }}
                    </td>

                </tr>

            </tbody>

        </table>
        {{-- <h5 style="font-weight: bold; text-align: right; margin-bottom: 10px;">
        Total Servicios: R${{ $order->total_services }}
    </h5> --}}
        </table>
    @endif

    {{--  <h5 style="font-weight: bold; text-align: right; margin-bottom: 10px;">
        Valor Total : R${{ $order->total }}
    </h5> --}}
    <table
        style="
        width:250px;
        margin-left:auto;
        margin-top:20px;
        border-collapse:collapse;
    ">
        @if ($order->total_products > 0)
            <tr>
                <td>Total Produtos</td>

                <td style="text-align:right;">
                    R${{ number_format($order->total_products, 2, ',', '.') }}
                </td>
            </tr>
        @endif

        @if ($order->total_services > 0)
            <tr>
                <td>Total Serviços</td>

                <td style="text-align:right;">
                    R${{ number_format($order->total_services, 2, ',', '.') }}
                </td>
            </tr>
        @endif

         @if ($totalDiscount > 0)
            <tr>
                <td>Total Desconto</td>

                <td style="text-align:right;">
                    R${{ number_format($totalDiscount, 2, ',', '.') }}
                </td>
            </tr>
       @endif

        <tr>
            <td
                style="
                font-weight:bold;
                border-top:2px solid #000;
                padding-top:5px;
            ">
                TOTAL
            </td>

            <td
                style="
                font-weight:bold;
                text-align:right;
                border-top:2px solid #000;
                padding-top:5px;
            ">
                R${{ number_format($order->total, 2, ',', '.') }}
            </td>
        </tr>
    </table>

    {{-- <div
    style="
        margin-top:50px;
        text-align:center;
    "
>
    _______________________________<br>
    Rey Diaz<br>
    Responsável Técnico
</div> --}}

    <div style="
    margin-top:40px;
    text-align:center;
    font-size:10px;
    color:#777;
">
        Obrigado pela preferência.
    </div>
</body>

</html>
