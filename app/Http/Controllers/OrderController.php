<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Service;
use App\Models\OrderService;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create');
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    // AJAX search
    /*     public function searchProducts(Request $request)
    {
        $q = $request->get('q');

        $products = Product::where('name', 'ilike', "%$q%")
            ->orWhere('code', 'ilike', "%$q%")
            ->limit(10)
            ->get();

        return response()->json($products);
    } */

    //  guardar presupuesto
    public function store(Request $request)
    {
       DB::transaction(function () use ($request) {

            $order = Order::create([
                'customer' => $request->customer,
                'total' => 0,
                'total_products' => 0,
                'total_services' => 0,
            ]);

            foreach ($request->products as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['quantity'] * $item['price'],
                ]);
            }
                foreach ($request->services as $item) {

                $subtotal = $item['quantity'] * $item['price'];

                $discountPercent = $item['discount'] ?? 0;

                $discountValue = ($subtotal * $discountPercent) / 100;

                OrderService::create([
                    'order_id'         => $order->id,
                    'service_id'       => $item['id'],
                    'quantity'         => $item['quantity'],
                    'price'            => $item['price'],
                    'discount_percent' => $discountPercent,
                    'discount_value'   => $discountValue,
                    'subtotal'         => $subtotal - $discountValue,
                ]);
            }

            // Totales
            $totalProducts = $order->orderProducts()->sum('subtotal');
            $totalServices = $order->orderServices()->sum('subtotal');

            $order->update([
                'total_products' => $totalProducts,
                'total_services' => $totalServices,              
                'total' => $totalProducts + $totalServices

            ]);
        });

        return response()->json(['success' => true]);
    }

    public function edit(Order $order)
    {
        $order->load(
            'orderProducts.product',
            'orderServices.service'
        );

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        DB::transaction(function () use ($request, $order) {

            $order->update([
                'customer' => $request->customer,
            ]);

            // Eliminar detalle actual
            $order->orderProducts()->delete();
            $order->orderServices()->delete();

            // Productos
            foreach ($request->products as $item) {

                OrderProduct::create([
                    'order_id'  => $order->id,
                    'product_id' => $item['id'],
                    'quantity'  => $item['quantity'],
                    'price'     => $item['price'],
                    'subtotal'  => $item['quantity'] * $item['price'],
                ]);
            }

            // Servicios
            foreach ($request->services as $item) {

                OrderService::create([
                    'order_id'  => $order->id,
                    'service_id' => $item['id'],
                    'quantity'  => $item['quantity'],
                    'price'     => $item['price'],
                    'subtotal'  => $item['quantity'] * $item['price'],
                ]);
            }

            $totalProducts = $order->orderProducts()->sum('subtotal');
            $totalServices = $order->orderServices()->sum('subtotal');

            $order->update([
                'total_products' => $totalProducts,
                'total_services' => $totalServices,
                'total'          => $totalProducts + $totalServices,
            ]);
        });

        return redirect('/orders');
        /*  return response()->json([
            'success' => true
        ]); */
    }

    public function destroy(Order $order)
    {
        $order->delete();
        /*   DB::transaction(function () use ($order) {

            $order->orderProducts()->delete();

            $order->orderServices()->delete();

            $order->delete();
        }); */
        return redirect('/orders');
    }


    public function pdf(Order $order)
    {

        $order->load([
            'orderProducts.product',
            'orderServices.service'
        ]);

        $totalDiscount = $order->orderServices->sum('discount_value');

        $pdf = Pdf::loadView(
            'orders.pdf',
            compact('order', 'totalDiscount')
        );

        /* return $pdf->download(
            'orçamento-' . $order->customer . '.pdf'
        ); */
        return $pdf->stream(
            'orçamento_' . $order->customer . '.pdf'
        );
    }
}
