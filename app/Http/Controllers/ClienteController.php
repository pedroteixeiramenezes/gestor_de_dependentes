<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['nome_pesquisar']) && strlen($_GET['nome_pesquisar'])>1)
        {
            $search_text = $request->input('nome_pesquisar');
            $clientes = Cliente::where('nome', 'LIKE', '%' .$search_text.'%')->get();
            return view('cliente.index', compact('clientes'));
        }else{
            $clientes = Cliente::all();
            return view('cliente.index', compact('clientes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
        ];

        $validator = Validator::make($request->all(),[
            'nome' => 'required',
            'cpf' => 'required|cpf',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado'=> 'required',
            'pais'=> 'required',
            'cep' => 'required',

        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status' =>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }else{
             $cliente = new Cliente;
             $cliente ->nome = $request->input('nome');
             $cliente ->cpf = $request->input('cpf');
             $cliente ->logradouro = $request->input('logradouro');
             $cliente ->numero = $request->input('numero');
             $cliente ->bairro = $request->input('bairro');
             $cliente ->cidade = $request->input('cidade');
             $cliente ->estado = $request->input('estado');
             $cliente ->pais = $request->input('pais');
             $cliente ->cep = $request->input('cep');
             $cliente ->save();
             return response()->json([
                'status' =>200,
                'message' => 'Cliente Adicionado com Sucesso',
             ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if($cliente)
        {
            return response()->json([
                'status'=>200,
                'cliente'=> $cliente,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhum Cliente Encontrado'
            ]);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mensagens = [
            'required' => ':Attribute é obrigatório!',
        ];
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cpf' => 'required|cpf',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado'=> 'required',
            'pais'=> 'required',
            'cep' => 'required',
        ], $mensagens);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors' => $validator->getMessageBag(),
            ]);
        }
        else
        {
            $cliente = Cliente::find($id);
            if($cliente)
            {
            $cliente ->nome = $request->input('nome');
            $cliente ->cpf = $request->input('cpf');
            $cliente ->logradouro = $request->input('logradouro');
            $cliente ->numero = $request->input('numero');
            $cliente ->bairro = $request->input('bairro');
            $cliente ->cidade = $request->input('cidade');
            $cliente ->estado = $request->input('estado');
            $cliente ->pais = $request->input('pais');
            $cliente ->cep = $request->input('cep');
             $cliente->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Cliente Atualizado com Sucesso.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Nenhum Cliente Encontrado'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if($cliente)
        {
            $cliente->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Cliente Deletado com Sucesso.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nenhum Cliente Encontrado.'
            ]);
        }
    }

    public function modificarStatus(Request $request)
    {
        $cliente = Cliente::find($request->usuario_id);
        $cliente->status = $request->status;
        $cliente->save();
        return response()->json(['success'=>'Status modificado com sucesso!']);
    }
    public function modificarStatusPagamento(Request $request)
    {
        $cliente = Cliente::find($request->usuario_id);
        $cliente->servicos = $request->servicos;
        $cliente->save();
        return response()->json(['success'=>'Status do Pagamento modificado com sucesso!']);
    }

}