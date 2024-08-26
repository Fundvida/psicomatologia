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

        $paciente = DB::table('pacientes as p')
                ->join('sesions as s', 's.paciente_id', '=', 'p.id')
                ->where('s.id', $sesion_id)
                ->select('p.tipo_paciente')
                ->first();
        $paciente_tipo = $paciente->tipo_paciente;

        if($paciente_tipo == 'mayor'){
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
        }else {
            $results = DB::table('sesions as s')
            ->join('pacientes as p', 'p.id', '=', 's.paciente_id')
            ->join('pacientemenor as pm', 'pm.id', '=', 'p.usermenor_id')
            ->join('paciente_tutor as pt', 'pt.paciente_id', '=', 'p.id')
            ->join('tutors as t', 't.id', '=', 'pt.tutor_id')
            ->join('users as u', 'u.id', '=','t.user_id')
            ->where('s.id', $sesion_id)
            ->select(
                's.id as sesion_id', 
                'pm.name', 
                'pm.apellidos', 
                'pm.fecha_nacimiento',
                'u.name as tutor_name',
                'u.apellidos as tutor_apellido',
                'u.telefono as tutor_tel',
                DB::raw('TIMESTAMPDIFF(YEAR, pm.fecha_nacimiento, CURDATE()) as edad'),
                DB::raw('DATE(s.fecha_hora_inicio) as fecha_sesion'),
                DB::raw('(SELECT COUNT(*)+1 FROM sesions WHERE paciente_id = s.paciente_id AND estado NOT IN ("Cancelado", "activo")) as numero_sesion'),
                DB::raw('(SELECT name FROM users WHERE id=(SELECT user_id FROM psicologos WHERE id=s.psicologo_id)) as nombre_psicologo'),
                DB::raw('(SELECT apellidos FROM users WHERE id=(SELECT user_id FROM psicologos WHERE id=s.psicologo_id)) as apellido_psicologo')
            )->first();    
        }
        
        $saved = FichaAtencionTerapeutica::where('sesion_id', $sesion_id)->first();

        return view('formFichaAtencion', compact('results', 'saved', 'paciente_tipo'));
    }

    public function saveFichaAdults(Request $request){
        $ficha = FichaAtencionTerapeutica::where('sesion_id', $request->input('sesion_id'));
        $sesion_id = $request->input('sesion_id');
        if($ficha){
            try{
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
        } catch (\Exception $e) {
            //return redirect()->back()->with('error', 'Hubo un problema al actualizar la ficha: ' . $e->getMessage());
            return redirect()->route('psicologo.sesiones')->with('error', 'Hubo un problema al actualizar la ficha: ' . $e->getMessage());
        }
        }

        return redirect()->route('psicologo.sesiones')->with('success', 'Ficha de atención terapéutica guardada exitosamente!');
    }
    public function saveFichaChildren(Request $request){
        //return response()->json($request);

        $ficha = FichaAtencionTerapeutica::where('sesion_id', $request->input('sesion_id'));
        $sesion_id = $request->input('sesion_id');
        if($ficha){
            try{
            $ficha->update([
                'numero_sesion'     => $request->input('numeroSesion'),
                'fecha_sesion'      => $request->input('fechaSesion'),
                'descripcion_problema'  => $request->input('descripcionProblema'),
                'observacion_padres_motivo'=> $request->input('observacionesPadres'),
                'objetivos_terapeuticos'      => $request->input('objetivosTerapeuticos'),
                'historia_desarrollo'   => $request->input('historiaDesarrollo'),
                'eventos_significativos'          => $request->input('eventosSignificativos'),
                'relaciones_familiares'=> $request->input('relacionesFamiliares'),
                'estado_emocional_nino'         => $request->input('estadoEmocional'),
                'observaciones_terapeuta'    => $request->input('comportamientosObservados'),
                'sintomas_reportados'=> $request->input('sintomasReportados'),
                'intervenciones_especificas'           => $request->input('actividadesRealizadas'),
                'tecnicas_utilizadas'             => $request->input('tecnicasEstrategias'),
                'temas_tratados'        => $request->input('temasTratados'),
                'tareas_paciente'          => $request->input('tareasNino'),
                'fecha_entrega'=> $request->input('fechaEntrega'),
                'progreso_objetivos'  => $request->input('progresoObjetivos'),
                'cambios_notables'             => $request->input('cambiosNotables'),
                'retroalimentacion_paciente'     => $request->input('retroalimentacion'),
                'observacion_padres'         => $request->input('observacionesPadres2'),
                'objetivos_proxima_sesion'         => $request->input('objetivosProximaSesion'),
                'areas_enfoque'         => $request->input('areasEnfoque'),
                'preparacion_necesaria'         => $request->input('preparacionNino'),
                'notas_adicionales'         => $request->input('notasAdicionales'),
            ]);
        } catch (\Exception $e) {
            //return redirect()->back()->with('error', 'Hubo un problema al actualizar la ficha: ' . $e->getMessage());
            return redirect()->route('psicologo.sesiones')->with('error', 'Hubo un problema al actualizar la ficha: ' . $e->getMessage());
        }
        }

        return redirect()->route('psicologo.sesiones')->with('success', 'Ficha de atención terapéutica guardada exitosamente!');
    }
}
