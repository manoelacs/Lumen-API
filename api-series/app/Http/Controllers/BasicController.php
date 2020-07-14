<?php


namespace App\Http\Controllers;


use App\Models\Serie;
use http\Env\Response;
use Illuminate\Http\Request;

abstract class BasicController
{
    protected $classe;
    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                $this->classe::create($request->all()),
                201
            );
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
       if($recurso ){

           return response()->json($recurso);
       }
       return response()->json(['error' => 'Não existe esse ID'], 204); # 204: not content


    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if($recurso){
            $recurso->fill($request->all()); //pegar todos os elementos do request e atualizar
            $recurso->save();
            return response()->json($recurso, 202); #Accepted
        }
        return response()->json(['error' => 'Série não encontrada'], 404); #not found
    }

    public function destroy(int $id)
    {
        if($this->classe::find($id)){
            $this->classe::destroy($id);
            return response()->json(['message'=>'Removido com sucesso'], 202);
        }
        return response()->json(['error'=> 'Não existe esse recurso'], 404);

    }

}
