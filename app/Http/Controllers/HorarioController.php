<?php

namespace App\Http\Controllers;

use App\Http\Resources\HorarioResource;
use App\Models\Horario;
use App\Models\Psicologo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class HorarioController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $psicologo = Psicologo::where('user_id', $user->id)->first();
            $horarios = Horario::where('psicologo_id', '=', $psicologo->id)
                ->where(function ($query) {
                    $query->where('isDisponibleManiana', 1)
                        ->orWhere('isDisponibleTarde', 1);
                })
                ->select(
                    'id',
                    'dia',
                    'hora_inicio_maniana',
                    'hora_fin_maniana',
                    'hora_inicio_tarde',
                    'hora_fin_tarde',
                    'isDisponibleManiana',
                    'isDisponibleTarde'
                )
                ->paginate();
            $horarioCollection = HorarioResource::collection($horarios);
            $customData = [
                'horarios' => $horarioCollection,
                'message' => 'horarios obtenidos correctamente',
                'intervalos' => 30,
                'status' => 'success'
            ];
            //return HorarioResource::collection($horarios);
            return response()->json($customData, 200);
        } else {
            return response()->json([
                'message' => 'The user did not sign in',
                'status' => 'error',
            ], 409);
        }
        // return view('horariospsico.index', compact('horarios'))
        //     ->with('i', ($request->input('page', 1) - 1) * $horarios->perPage());
    }


    /**
     * 
     */
    public function getHorariosPsicologo(Request $request)
    {

        $user = Auth::user();
        // $psicologo = Psicologo::where('user_id', $user->id)->first();
        $horarios = Horario::where('psicologo_id', $request->input('psicologo_id'))
            ->where(function ($query) {
                $query->where('isDisponibleManiana', 1)
                    ->orWhere('isDisponibleTarde', 1);
            })
            ->select(
                'id',
                'dia',
                'hora_inicio_maniana',
                'hora_fin_maniana',
                'hora_inicio_tarde',
                'hora_fin_tarde',
                'isDisponibleManiana',
                'isDisponibleTarde'
            )
            ->get();
        $i = 0;
        $j = 0;
        $intervalo = 60;
        $periods = [];
        //$tz = 'Europe/Madrid';
        $tz = date_default_timezone_get();
        foreach ($horarios as $horario) {
            $j++;
            $dia = $horario->dia;
            $isDisponibleManiana = $horario->isDisponibleManiana;
            $isDisponibleTarde = $horario->isDisponibleTarde;
            if ($isDisponibleManiana) {
                $horaInicioManiana = Carbon::createFromFormat('H:i:s', $horario->hora_inicio_maniana);
                $horaFinManiana = Carbon::createFromFormat('H:i:s', $horario->hora_fin_maniana);

                if ($horaInicioManiana && $horaFinManiana) {
                    while ($horaInicioManiana->lt($horaFinManiana)) {
                        // $periods[$dia][] = [
                        $periods[$i] = [
                            'dia' => $dia,
                            'hora_inicio_maniana' => $horaInicioManiana->Format('H:i:s'),
                            'hora_fin_maniana' => $horaInicioManiana->addMinutes($intervalo)->Format('H:i:s'),
                            'isDisponibleManiana' => 1,
                            'isdisponibleTarde'=>0,

                        ];
                        $i++;
                    }
                    // if ($i == 2)
                    // return response()->json([
                    //     'periods' => $periods,
                    //     'horarios' => $horarios,
                    // ]);
                }
            }
            if ($isDisponibleTarde) {
                $horaInicioTarde = Carbon::createFromFormat('H:i:s', $horario->hora_inicio_tarde);
                $horaFinTarde = Carbon::createFromFormat('H:i:s', $horario->hora_fin_tarde);
                if ($horaInicioTarde && $horaFinTarde) {
                    while ($horaInicioTarde->lt($horaFinTarde)) {
                        // $periods[$dia][] = [
                        $periods[] = [
                            'dia' => $dia,
                            'hora_inicio_tarde' => $horaInicioTarde->Format('H:i:s'),
                            'hora_fin_tarde' => $horaInicioTarde->addMinutes($intervalo)->Format('H:i:s'),
                            'isDisponibleTarde' => 1,
                            'isDisponibleManiana' => 0,
                        ];
                    }
                    // if ($i == 2)
                    // return response()->json([
                    //     'periods' => $periods,
                    //     'horarios' => $horarios,
                    // ]);
                }
            }

            // $meeting = Carbon::createFromTime(19, 15, 00, 'Africa/Johannesburg');

            // echo 'Meeting starts at ' . $meeting->format('H:i') . ' in Johannesburg.';
            // if ($j == 2)
            //     return response()->json([
            //         'horario' => $horario,
            //         'hora_inicio_maniana' => $horario->hora_inicio_maniana,
            //         'hora_fin_maniana' => $horaFinManiana,
            //         'mettin'=>$meeting->format('H:i'),
            //     ]);
            // $horaInicioTarde = Carbon::createFromFormat('H:i:s', $horario->hora_inicio_tarde);
            // $horaFinTarde = Carbon::createFromFormat('H:i:s', $horario->hora_fin_tarde);

            // Ensure both times are valid
            if($isDisponibleManiana){
                if ($horaInicioManiana && $horaFinManiana && $isDisponibleManiana) {
                    while ($horaInicioManiana->lt($horaFinManiana)) {
                        // $periods[$dia][] = [
                        $periods[$i] = [
                            'dia' => $dia,
                            'hora_inicio_maniana' => $horaInicioManiana->Format('H:i:s'),
                            'hora_fin_maniana' => $horaInicioManiana->addMinutes($intervalo)->Format('H:i:s'),
                            'isDisponibleManiana' => 1,
                        ];
                        $i++;
                    }
                    // if ($i == 2)
                    // return response()->json([
                    //     'periods' => $periods,
                    //     'horarios' => $horarios,
                    // ]);
                }
            }
            if($isDisponibleTarde){
                if ($horaInicioTarde && $horaFinTarde && $isDisponibleTarde) {
                    while ($horaInicioTarde->lt($horaFinTarde)) {
                        // $periods[$dia][] = [
                        $periods[$i] = [
                            'dia' => $dia,
                            'hora_inicio_maniana' => $horaInicioTarde->Format('H:i:s'),
                            'hora_fin_maniana' => $horaInicioTarde->addMinutes($intervalo)->Format('H:i:s'),
                            'isDisponibleManiana' => 1,
                        ];
                        $i++;
                    }
                    // if ($i == 2)
                    // return response()->json([
                    //     'periods' => $periods,
                    //     'horarios' => $horarios,
                    // ]);
                }
            }
        }


        $fechaActual = Carbon::now();
        Carbon::setLocale('es');
        $diaSemana = $fechaActual->dayOfWeek;

        $diasRestantes = 7 - $diaSemana;
        $diasSemana[] = [
            'year' => $fechaActual->year,
            'month' => $fechaActual->translatedFormat('F'),
            'day' => $fechaActual->dayName,
            'dayInteger' => $fechaActual->day,
        ];

        for ($i = 1; $i < $diasRestantes; $i++) {
            $nuevaFecha = $fechaActual->copy()->addDays($i);
            $diasSemana[] = [
                'year' => $nuevaFecha->year,
                'month' => $nuevaFecha->translatedFormat('F'),
                'day' => $nuevaFecha->dayName,
                'dayInteger' => $nuevaFecha->day,
            ];
        }
        $data = [
            'diasRestantes' => $diasSemana,
            'horarios' => $horarios,
            'intervalos' => 60,
            'periodos' => $periods,
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $horario = new Horario();

        return view('horariospsico.create', compact('horario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //:Horario //RedirectResponse
    {
        // dd($request);
        // Horario::create($request->validated());
        // return Horario::create($request->validated());

        // return Redirect::route('horariopsico.index')
        //     ->with('success', 'horario created successfully.');

        // Obtener los datos de la solicitud
        $horario_dia = $request->id_horario_dia;
        $diasSeleccionados = $request->input('dias');
        $horaInicio = date('H:i:s', strtotime($request->horaInicio));
        $horaFin = date('H:i:s', strtotime($request->horaFin));
        $horaInicioT = date('H:i:s', strtotime($request->horaInicioT));
        $horaFinT = date('H:i:s', strtotime($request->horaFinT));
        $psicologo = Psicologo::where('user_id', $request->user_id)->firstOrFail(); // SOLO PARA OBTENER EL ID psicologo

        // Obtener todos los horarios del psicologo
        $horarios = Horario::where('psicologo_id', $psicologo->id)->get();

        // Iterar sobre los horarios
        foreach ($horarios as $horario) {
            // Verificar si el día está seleccionado en el formulario
            if (in_array($horario->dia, $diasSeleccionados)) {
                // Si está seleccionado, actualizar los campos correspondientes


                if ($horario_dia == 1) {
                    $horario->hora_inicio_maniana = $horaInicio;
                    $horario->hora_fin_maniana = $horaFin;
                    $horario->isDisponibleManiana = true;
                } else {
                    $horario->hora_inicio_tarde = $horaInicioT;
                    $horario->hora_fin_tarde = $horaFinT;
                    $horario->isDisponibleTarde = true;
                }
            }
            // else {
            //     // Si no está seleccionado, marcar como no disponible
            //     if ($horario_dia == 1) {
            //         $horario->isDisponibleManiana = false;
            //     } else {
            //         $horario->isDisponibleTarde = false;
            //     }
            // }
            if (!$horario->save()) {
                // Si no se puede guardar un horario, marcar como error
                $error = true;
            }
        }

        return redirect()->route('homePsicologoHorario')->with('resultado', 'actualizado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Horario //View
    {
        $horario = Horario::find($id);
        return $horario;
        // return view('horariopsico.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $horario = Horario::find($id);

        return view('horariopsico.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario, $id) //: Horario //RedirectResponse
    {
        $horarioTemp = Horario::find($id);
        $attributes = [];
        if ($request->id_horario_dia == 1) {
            $attributes['hora_inicio_maniana'] = date('H:i:s', strtotime($request->horaInicio));
            $attributes['hora_fin_maniana'] = date('H:i:s', strtotime($request->horaFin));
        } else if ($request->id_horario_dia == 2) {
            $attributes['hora_inicio_tarde'] = date('H:i:s', strtotime($request->horaInicioT));
            $attributes['hora_fin_tarde'] = date('H:i:s', strtotime($request->horaFinT));
        }
        $horarioTemp->update($attributes);
        return redirect()->route('homePsicologoHorario')->with('resultado', 'actualizado');
        // return Redirect::route('horariopsico.index')
        //     ->with('success', 'horario updated successfully');
    }

    public function destroy($id) //:Response //RedirectResponse
    {

        // $psicologo = Psicologo::where('user_id', $request->user_id)->first();
        // $horario = Horario::where('psicologo_id', $psicologo->id)
        //                     ->where('dia', $request->dia)->first();

        // if($request->horario_dia == 1){
        //     $horario->isDisponibleManiana = false;
        // }else {
        //     $horario->isDisponibleTarde = false;
        // }
        // $horario->save();

        // return response()->json($request);



        Horario::find($id)->delete();

        return response()->noContent();
        // return Redirect::route('horariopsico.index')
        //     ->with('success', 'horario deleted successfully');
    }

    public function inhabilitarHorario(Request $request, $id)
    {
        $horarioTemp = Horario::find($id);
        $attributes = [];
        if ($request->id_horario_dia == 1) {
            $attributes['isDisponibleManiana'] = false;
            $attributes['hora_inicio_maniana'] = date('H:i:s', strtotime('00:00:00'));
            $attributes['hora_fin_maniana'] = date('H:i:s', strtotime('00:00:00'));
        } else if ($request->id_horario_dia == 2) {
            $attributes['isDisponibleTarde'] = false;
            $attributes['hora_inicio_tarde'] = date('H:i:s', strtotime('00:00:00'));
            $attributes['hora_fin_tarde'] = date('H:i:s', strtotime('00:00:00'));
        }
        $horarioTemp->update($attributes);

        return response()->json($request);
    }
}
