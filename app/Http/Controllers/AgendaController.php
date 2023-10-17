<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function CadastroAgenda(AgendaFormRequest $requet)
    {
        $agendas = Agenda::create([

            'profissional_id' => $requet->profissional_id,
            'cliente_id' => $requet->cliente_id,
            'servico_id' => $requet->servico_id,
            'data_hora' => $requet->data_hora,
            'pagamento' => $requet->pagamento,
            'valor' => $requet->valor
        ]);
        return response()->json([
            'success' => true,
            'data' => $agendas,
            'message' => "Agenda Cadstrado com sucesso"

        ]);
    }
}
