<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaUpdateFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
   public function cadastrarAgenda(AgendaFormRequest $request){
        $agendas = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'data_hora'=>$request->data_hora,
         
           
        ]);  
       
        return response()->json([
            "success" => true,
            "message" =>"Agenda Cadastrado com sucesso",
            "data" => $agendas
        ],200);
    }

    public function retornarTodosAgenda()
    {
        $agendas = Agenda::all();
        return response()->json([
            'status' => true,
            'data' => $agendas
        ]);
    }

   

   
    public function pesquisarPorAgenda(Request $request){
        $agendas = Agenda::where('data_hora', '=', $request->data_hora)->where('profissional_id', '=',  $request->profissional_id)->get();
   
        if(count($agendas)>0){
            return response()->json([
                'status'=>true,
                'data'=> $agendas
            ]);
        }
       
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
   
    }

    public function excluirAgenda($id){
        $agenda = Agenda::find($id);
   
        if(!isset($agenda)){
            return response()->json([
                'status' => false,
                'message' => "agendamento não encotrado"
            ]);
        }
   
        $agenda->delete();
   
        return response()->json([
            'status' => true,
            'message' => "agendamento excluido com sucesso"
        ]);
    }

    public function atualizarAgenda(AgendaUpdateFormRequest $request){
        $agendas = agenda::find($request->id);
   
        if(!isset($agendas)){
            return response()->json([
                'status' => false,
                'message' => "agendamento não encontrado"
            ]);
        }
   
        if(isset($request->profissional_id)){
            $agendas->profissional_id = $request->profissional_id;
        }
        if(isset($request->data_hora)){
            $agendas->data_hora = $request->data_hora;
        }
   
   
        $agendas-> update();
   
        return response()->json([
            'status' => true,
            'message' => "agendamento atualizado"
        ]);
   
    }
}
