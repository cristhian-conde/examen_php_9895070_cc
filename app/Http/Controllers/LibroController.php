<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Http\Resources\LibroCollection;
use App\Http\Resources\LibroResource;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;

class LibroController extends Controller
{
    public function index(){
        $libros = Libro::all();
        return new LibroCollection($libros);
    }

    public function show(Libro $libro){
        return new LibroResource($libro);
    }

    public function store(StoreLibroRequest $request){
        return new LibroResource(Libro::create($request->all()));
    }

    public function update(UpdateLibroRequest $request, Libro $libro){
        $libro->update($request->all());
        return new LibroResource($libro);
    }

    public function destroy(Libro $libro){
        $libro->delete();
        $data=[
            'message' => 'Libro deleted'
        ];
        return response()->json($data, 200);
    }
}
