<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;
        $products = Product::query()
            ->when($search, function ($query) use ($search) {

                $query->where('name', 'ilike', "%{$search}%")
                    /*  ->orWhere('code', 'like', "%{$search}%") */;
            })

            ->orderBy('id', 'desc')

            ->paginate(10);

        return view('products.index', compact('products'));

        /* $products = Product::orderBy('id', 'asc')->get();
        return view('products.index', compact('products')); */
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
       
        Product::create([

            'name' => $request->name,

            'description' => $request->description ?? '',

            'unit_type' => $request->unit_type,

            'buy_price' => $request->buy_price ?? 0,

            'unit_price' => $request->unit_price  ?? 0,

            'stock' => $request->stock ?? 0,
        ]);

        if ($request->return == 'order') {
            return redirect()->route('orders.create');
        }

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([

            'name' => $request->name,

            'description' => $request->description,

            'unit_type' => $request->unit_type,

            'buy_price' => $request->buy_price,

            'unit_price' => $request->unit_price,

            'stock' => $request->stock,
        ]);

        return redirect('/products');
    }

    public function searchProducts(Request $request)
    {
        $q = $request->get('q');

        $products = Product::where('name', 'ilike', "%$q%")
            ->orWhere('code', 'ilike', "%$q%")
            ->limit(10)
            ->get();

        return response()->json($products);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado');
    }
}
