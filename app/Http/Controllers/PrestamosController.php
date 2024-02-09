<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Http\Resources\PrestamosCollection;
use App\Http\Resources\PrestamosResource;
use App\Http\Requests\StorePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use Carbon\Carbon;

class PrestamosController extends Controller
{
    private function prestamosPorPeriodo($inicio, $fin){
        return Prestamos::whereBetween('fecha_prestamo', [$inicio, $fin])->get();
    }

    public function index(Request $request){
        $filter = $request->input('filter', null);
        $prestamos = collect(); // Inicializar una colección vacía

        switch ($filter) {
            case 'semana':
                $prestamos = $this->prestamosPorPeriodo(Carbon::now()->subWeeks(24)->startOfWeek(), Carbon::now()->endOfWeek());
                break;

            case 'mes':
                $prestamos = $this->prestamosPorPeriodo(Carbon::now()->subMonths(12)->startOfMonth(), Carbon::now()->endOfMonth());
                break;

            default:
                // Sin cambios
                $prestamos = Prestamos::all();
        }
        if ($filter) {
            $prestamos = $prestamos->groupBy(function ($date) use ($filter) {
                return Carbon::parse($date->fecha_prestamo)->format($filter === 'semana' ? 'W Y' : 'F Y');
            });
            return new PrestamosCollection($prestamos);
        }
        return new PrestamosCollection($prestamos);
    }

    public function show(Prestamos $prestamo){
        return new PrestamosResource($prestamo);
    }

    public function store(StorePrestamosRequest $request){
        return new PrestamosResource(Prestamos::create($request->all()));
    }

    public function update(UpdatePrestamosRequest $request, Prestamos $prestamo){
        $prestamo->update($request->all());
        return new PrestamosResource($prestamo);
    }

    public function destroy(Prestamos $prestamo){
        $prestamo->delete();
        $data=[
            'message' => 'Prestamo deleted'
        ];
        return response()->json($data, 200);
    }
}
