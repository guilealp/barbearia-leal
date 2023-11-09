<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function servicoCreate(ServicoFormRequest $request)
    {


        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco
        ]);
        return response()->json([
            "success" => true,
            "message" => " cadastrado com sucesso",
            "data" => $servico
        ], 200);
    }
    public function pesquisarPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($servico) > 0) {
            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function exibirTodosServico()
    {
        $servico = Servico::all();
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function editarServiço(Request $request)
    {
        $servico = Servico::find($request->id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'massage' => "Serviço não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $servico->nome = $request->nome;
        }
        if (isset($request->descricao)) {
            $servico->descricao = $request->descricao;
        }

        if (isset($request->duracao)) {
            $servico->duracao = $request->duracao;
        }

        if (isset($request->preco)) {
            $servico->preco = $request->preco;
        }

        $servico->update();
        return response()->json([
            'status' => true,
            'message' => "Serviço atualizado"
        ]);
    }

    public function excluir($id)
    {
        $servico = Servico::find($id);

        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'massage' => "serviço não encontrado"
            ]);
        }
        $servico->delete();

        return response()->json([
            'status' => true,
            'message' => "Serviço excluido com sucesso"
        ]);
    }
    public function pesquisarPorId($id){
        $servico = Servico::find($id);
        if($servico == null){
            return response()->json([
                'status'=>false,
                'message'=> "servico não encontrado"
            ]);
        }
        return response()->json([
            'status'=>true,
            'data'=> $servico
        ]);

        } 
}
