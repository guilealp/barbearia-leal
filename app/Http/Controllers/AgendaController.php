<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Requests\AgendaUpdateFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AgendaController extends Controller
{
   public function cadastrarAgenda(AgendaFormRequest $request){

    $dataAtual = Carbon::now('America/Sao_Paulo');

        $data_hora = Carbon::parse($request->data_hora);

        if ($dataAtual->gt($data_hora)) {
            return response()->json([
                "status" => false,
                "error" => ["A data e hora devem ser posteriores ao dia de hoje."]
            ], 400);
        }
        $agendaExistente = Agenda::where('profissional_id', $request->profissional_id)
            ->where('data_hora', $data_hora)
            ->first();

        if ($agendaExistente) {
            return response()->json([
                "status" => false,
                "message" => "Já existe uma agenda cadastrada para essa data e profissional."
            ], 400);
        }
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

   

   
    public function pesquisarPorAgenda(Request $request)
    {

        $agendas = Agenda::where('data_hora', '>=', $request->data_hora )->get();
        if (count($agendas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $agendas
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
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
