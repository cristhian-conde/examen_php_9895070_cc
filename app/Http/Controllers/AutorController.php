<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Http\Resources\AutorCollection;
use App\Http\Resources\AutorResource;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;

class AutorController extends Controller
{
    public function index(){
        $autores = Autor::all();
        return new AutorCollection($autores);
    }

    public function show(Autor $autor){
        return new AutorResource($autor);
    }

    public function store(StoreAutorRequest $request){
        return new AutorResource(Autor::create($request->all()));
    }

    public function update(UpdateAutorRequest $request, Autor $autor){
        return new AutorResource($autor->update($request->all()));
        return new AutorResource($autor);
    }

    public function destroy(Autor $autor){
        $autor->delete();
        $data=[
            'message' => 'Autor deleted'
        ];
        return response()->json($data, 200);
    }
}
