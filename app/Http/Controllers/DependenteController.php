<?php

namespace App\Http\Controllers;

use App\Models\Dependente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function fetchdependente($id)
    {
        $dependente = Dependente::where('cliente_id', $id)->get();
        return response()->json(['dependente'=>$dependente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
            'email_dependente.email' => 'Digite um email válido'
        ];

        $validator = Validator::make($request->all(),[
            'cliente_id' => 'required',
            'nome_dependente'=> 'required',
            'email_dependente' => 'email',
            'cpf_dependente' => 'required|cpf',
        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status' =>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }else{
             $dependente = new Dependente;
             $dependente->cliente_id = $request->input('cliente_id');
             $dependente->nome = $request->input('nome_dependente');
             $dependente->email = $request->input('email_dependente');
             $dependente->cpf = $request->input('cpf_dependente');
             $dependente->save();
             return response()->json([
                'status' =>200,
                'message' => 'Dependente Adicionado com Sucesso',
             ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function show(Dependente $dependente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependente $dependente, $id)
    {
        {
            {
                $dependente = Dependente::find($id);
                if($dependente)
                {
                    return response()->json([
                        'status'=>200,
                        'Dependente'=> $dependente,
                    ]);
                }
                else
                {
                    return response()->json([
                        'status'=>404,
                        'message'=>'Nenhum Dependente Encontrado'
                    ]);
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
        ];

        $validator = Validator::make($request->all(),[
            'cliente_id' => 'required',
            'nome_dependente'=> 'required',
            'email_dependente' => 'required|email',
            'cpf_dependente' => 'required|cpf'
        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status' =>400,
                'errors' => $validator->errors()->all(),
            ]);
        }else
        {
            $dependente = Dependente::find($id);
            if($dependente)
            {
            $dependente->cliente_id = $request->input('cliente_id');
            $dependente->nome = $request->input('nome_dependente');
            $dependente->email = $request->input('email_dependente');
            $dependente->cpf = $request->input('cpf_dependente');
            $dependente->update();

            return response()->json([
                    'status' =>200,
                    'message' => 'Dependente Atualizado com Sucesso',
                ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Nenhum Dependente Encontrado'
                ]);
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependente $dependente, $id)
    {
        {
            $dependente = Dependente::find($id);
            if($dependente)
            {
                $dependente->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'Dependente Deletado com Sucesso.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Nenhum Dependente Encontrado.'
                ]);
            }
        }
    }
}
