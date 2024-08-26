<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FichaAtencionTerapeutica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FichaAtencionController extends Controller
{
    public function index(Request $request){
        $sesion_id = $request->sesion_id;

        $ficha = FichaAtencionTerapeutica::where('sesion_id', $sesion_id)->first();
        if(!$ficha){
            FichaAtencionTerapeutica::create([
                'sesion_id' => $sesion_id
            ]);
        }

        $results = DB::table('sesions as s')
                ->join('pacientes as p', 'p.id', '=', 's.paciente_id')
                ->join('users as u', 'p.user_id', '=', 'u.id')
                ->where('s.id', $sesion_id)
                ->select(
                    's.id as sesion_id', 
                    'u.name', 
                    'u.apellidos', 
                    'u.fecha_nacimiento',
                    DB::raw('TIMESTAMPDIFF(YEAR, u.fecha_nacimiento, CURDATE()) as edad'),
                    DB::raw('DATE(s.fecha_hora_inicio) as fecha_sesion'),
                    DB::raw('(SELECT COUNT(*)+1 FROM sesions WHERE paciente_id = s.paciente_id AND estado NOT IN ("Cancelado", "activo")) as numero_sesion'),
                    DB::raw('(SELECT name FROM users WHERE id=(SELECT user_id FROM psicologos WHERE id=s.psicologo_id)) as nombre_psicologo'),
                    DB::raw('(SELECT apellidos FROM users WHERE id=(SELECT user_id FROM psicologos WHERE id=s.psicologo_id)) as apellido_psicologo')
                )->first(); 
        
        $saved = FichaAtencionTerapeutica::where('sesion_id', $sesion_id)->first();

        return view('formFichaAtencion', compact('results', 'saved'));
    }

    public function saveFichaAdults(Request $request){
        $ficha = FichaAtencionTerapeutica::find($request->input('sesion_id'));
        if($ficha){
            $ficha->update([
                'numero_sesion'     => $request->input('numeroSesion'),
                'fecha_sesion'      => $request->input('fechaSesion'),
                'descripcion_problema'  => $request->input('descripcionProblema'),
                'objetivos_terapeuticos'=> $request->input('objetivosTerapeuticos'),
                'estado_emocional'      => $request->input('estadoEmocional'),
                'sintomas_reportados'   => $request->input('sintomasReportados'),
                'nivel_estres'          => $request->input('nivelEstres'),
                'observaciones_terapeuta'=> $request->input('observacionTerapeuta'),
                'temas_tratados'         => $request->input('temasTratados'),
                'tecnicas_utilizadas'    => $request->input('tecnicasEstrategias'),
                'intervenciones_especificas'=> $request->input('intervencionEspecifica'),
                'tareas_paciente'           => $request->input('actividadesTareas'),
                'fecha_entrega'             => $request->input('fechaEntrega'),
                'progreso_objetivos'        => $request->input('progresoObjetivos'),
                'cambios_notables'          => $request->input('cambiosNotables'),
                'retroalimentacion_paciente'=> $request->input('retroalimentacion'),
                'objetivos_proxima_sesion'  => $request->input('objetivosProximaSesion'),
                'areas_enfoque'             => $request->input('areasEnfoque'),
                'preparacion_necesaria'     => $request->input('preparacionNecesaria'),
                'notas_adicionales'         => $request->input('notasAdicionales'),
            ]);
        }

        return redirect()->route('psicologo.sesiones')->with('success', 'Ficha de atención terapéutica guardada exitosamente!');
    }
}
