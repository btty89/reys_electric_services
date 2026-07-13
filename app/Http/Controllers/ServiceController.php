<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $services = Service::query()
            ->when($search, function ($query) use ($search) {

                $query->where('name', 'ilike', "%{$search}%")
                    /*  ->orWhere('code', 'like', "%{$search}%") */;
            })

            ->orderBy('id', 'desc')

            ->paginate(10);

        return view('services.index', compact('services'));
        // return view('services.index');
    }

    // AJAX search
    public function searchServices(Request $request)
    {
        $q = $request->get('q');

        $services = Service::where('name', 'ilike', "%$q%")
            ->limit(10)
            ->get();

        return response()->json($services);
    }


    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }


    public function update(Request $request, Service $service)
    {
        $service->update([

            'name' => $request->name,

            'description' => $request->description,

            'price' => $request->price
        ]);

        return redirect()->route('services.index');
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        Service::create([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'price' => $request->price ?? 0
        ]);
        
        if ($request->return == 'order') {
            return redirect()->route('orders.create');
        }

        return redirect('/services');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Servicio eliminado');
    }
}
