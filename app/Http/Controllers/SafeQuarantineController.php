<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanionQuestionnaire;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuestionnaireExport;
use App\SafeControl;
use Session;
use PDF;
use App\Lang;

class SafeQuarantineController extends Controller
{
    public function __construct()
    {
        Session::forget(['name', 'fecha_inicio', 'fecha_fin']);
        $this->langs_model = new Lang();
    }

    public function index(Request $request)
    {
        Session::put([
            'name' => $request->name,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        $control = SafeControl::search(Session::get('name'), Session::get('fecha_inicio'), Session::get('fecha_fin'))
        ->orderBy('created_at', 'DESC')
        ->paginate(20);

        return view('safe-quarantine-control.index', ['control_data' => $control]);
    }

    /*
    public function exportExcel()
    {
        $questionnaires = Questionnaire::search(Session::get('name'), Session::get('fecha_inicio'), Session::get('fecha_fin'))
        ->orderBy('created_at', 'DESC')
        ->get();

        foreach ($questionnaires as $key => $questionnaire) {
            $questionnaire->companions = CompanionQuestionnaire::where('questionnaire_id', '=', $questionnaire->id)->select('full_name', 'younger')->get();
        }

        return Excel::download(new QuestionnaireExport($questionnaires), 'questionnaire.xlsx');
    }
    */
    public function exportPdf($safe_control = null)
    {
        $safe_controls = array();
        if ($safe_control != null && $safe_control) {
            $safe_control = SafeControl::where('id', '=', $safe_control)
            ->select('id', 'rsv_folio', 'rsv_room', 'name','accept_terms','signature_img', 'id_lang', 'created_at')
            ->first();
            if (!$safe_control) {
                session(['message-error' => 'No se encontró el registro']);
                return back()->withInput();
            }
            $lang_code = $this->langs_model->get_lang_code_by_id($safe_control->id_lang)->code;
            $safe_control->language = $lang_code;            
            array_push($safe_controls, $safe_control);
        } else {
            $safe_controls = SafeControl::search(Session::get('name'), Session::get('fecha_inicio'), Session::get('fecha_fin'))
            ->orderBy('created_at', 'DESC')
            ->get();
        }

        //return $questionnaires;

        $pdf = PDF::loadView('safe-quarantine-control.pdf', ['safe_controls' => $safe_controls]);
        return $pdf->download('safe_quarantine.pdf');
    }

    
    public function show(SafeControl $questionnaire)
    {
        /*
        $questionnaire->companions = CompanionQuestionnaire::where('questionnaire_id', '=', $questionnaire->id)->select('full_name', 'younger')->get();

        return response()->json([
            'data' => $questionnaire,
            'msg' => 'Información enconradoa'
        ], 200);
        */
    }
    
}
