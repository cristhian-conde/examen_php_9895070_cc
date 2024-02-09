<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestamos;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index(Request $request){
        $filter = $request->input('prestamoVencido', null);
        if($filter){
            $clientes = Cliente::whereHas('prestamos', function ($query) {
                $query->where('fecha_prestamo', '<', Carbon::now())
                    ->where('estado', '!=', 'Devuelto');
            })->get();
        }else{
            $clientes = Cliente::all();
        }
        return new ClienteCollection($clientes);
    }

    public function show(Cliente $cliente){
        return new ClienteResource($cliente);
    }

    public function store(StoreClienteRequest $request){
        return new ClienteResource(Cliente::create($request->all()));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente){
        $cliente->update($request->all());
        return new ClienteResource($cliente);
    }

    public function destroy(Cliente $cliente){
        $cliente->delete();
        $data=[
            'message' => 'Cliente deleted'
        ];
        return response()->json($data, 200);
    }
}
