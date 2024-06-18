<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Notificacion;
use App\Models\Psicologo;
use App\Models\Sesion;
use Illuminate\Support\Facades\Log;
use App\Models\Pago;
use App\Models\Paciente;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function destroy($document){

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sesion = Sesion::where('id', $request->id_sesion)->first();
        $sesion->pago_confirmado = 1;
        $sesion->save();

        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagen = $request->file('file')->store('public/comprobantes');
        $url = Storage::url($imagen);
        File::create([
            'url' => $url,
            'paciente_id' => $request->id_paciente,
            'sesion_id' => $request->id_sesion,
            'tipo_doc' => 'Comprobante'
        ]);
        // Almacenar la URL anterior en la sesión
        session()->flash('previous_url', url()->previous());

        $psicologo_id = Sesion::where('id', $request->id_sesion)->pluck('psicologo_id')->first();
        $user_id = Psicologo::where('id', $psicologo_id)->pluck('user_id')->first();

        Notificacion::create([
            'descripcion' => 'Un usuario a realizado el pago de una sesión programada',
            'user_id' => $user_id,
            'sesion_id' => $request->id_sesion,
        ]);

        return redirect()->route('homePacienteSesiones');
    }

    public function getComprobanteXPaciente($sesion_id){
         $file = File::where('sesion_id', $sesion_id)
                        ->where('tipo_doc', 'Comprobante')
                        ->first();
         $pago = Pago::where('sesion_id', $sesion_id)->first();

         if ($file) {
            Log::info('Ruta de la imagen: ' . $file->url);
             
             $url = asset($file->url);
             return response()->json([
                'url' => $url,
                'isTerminado' => $pago->isTerminado
            ]);
         } else {
             return response()->json(['error' => 'Comprobante no encontrado'], 404);
         }
    }

    public function confirmarComprobante($sesion_id){
        $pago = Pago::where('sesion_id', $sesion_id)->first();
        $pago->isTerminado = 1;
        $pago->save();

        $sesion = Sesion::where('id', $sesion_id)->first();
        $paciente = Paciente::where('id', $sesion->paciente_id)->first();
        
        Notificacion::create([
            'descripcion' => 'Comprobante aprobado exitosamente!',
            'user_id' => $paciente->user_id,
            'sesion_id' => $sesion_id,
        ]);
    }

    public function rechazarComprobante($sesion_id){

        $sesion = Sesion::where('id', $sesion_id)->first();
        $sesion->pago_confirmado = 0;
        $sesion->save();

        $file = File::where('sesion_id', $sesion_id)
                    ->where('paciente_id', '!=', null)
                    ->delete();

        $paciente = Paciente::where('id', $sesion->paciente_id)->first();
        
        Notificacion::create([
            'descripcion' => 'Comprobante rechazado vuelva a subir su comprobante.',
            'user_id' => $paciente->user_id,
            'sesion_id' => $sesion_id,
        ]);
    }

    public function upload(Request $request){

        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx,png,jpg,txt|max:5048'
        ]);

        $imagen = $request->file('file')->store('public/documentos');
        $url = Storage::url($imagen);
        File::create([
            'url' => $url,
            'tipo_doc' => 'documento',
            'sesion_id' => $request->sesion_ids
        ]);
        // Almacenar la URL anterior en la sesión
        session()->flash('previous_url', url()->previous());
    }

    public function getDocumentPaciente($sesion_id){
        $documents = File::where('sesion_id', $sesion_id)
                    ->where('tipo_doc', 'documento')
                    ->get();
        return response()->json($documents);
    }

    public function deleteDocument(Request $request){
        $file = File::where('id', $request->file_id)->first();
        $url = str_replace('storage', 'public', $file->url);

        Storage::delete($url);

        $file->delete();

        return redirect()->route('psicologo.sesiones');
    }

    // TODO esperar
    public function uploadCv(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx,png,jpg,txt|max:5048'
        ]);

        $imagen = $request->file('file')->store('public/cvs');
        $url = Storage::url($imagen);
        File::create([
            'url' => $url,
            'tipo_doc' => 'documento',
            'sesion_id' => $request->sesion_ids
        ]);
        // Almacenar la URL anterior en la sesión
        session()->flash('previous_url', url()->previous());
    }
}
