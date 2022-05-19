<?php

namespace App\Http\Controllers;

use App\Exports\ProcesosExport;
use App\Models\Procesos;
use App\Models\Actividades;
use App\Models\CanalAtencion;
use App\Models\Clientes;
use App\Models\RealizadoPor;
use App\Models\Solicitantes;
use App\Models\TiempoInvertido;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Auth;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('colaborador')) {
            $usuario = auth()->user();
            $procesos = Procesos::where('realizado_por_id', '=', $usuario->id)->paginate(10);
        } else {
            $procesos = Procesos::paginate(10);
        }
        return view("proceso.index", compact('procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos["actividades"] = $this->getActividades();
        $datos["canales"] = $this->getCanalAtencion();
        $datos["solicitantes"] = $this->getSolicitante();
        $datos["clientes"] = $this->getClientes();
        $datos["tiempos"] = $this->getTiempoInvertido();
        $datos["fecha_actual"] = date('Y-m-d');
        return view("proceso.create", $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProceso = request()->except('_token');


        if($request->hasFile('evidencia')){
            $datosProceso['evidencia'] = $request->file('evidencia')->store('upload','public');
        }
        if($request->hasFile('costo_actividad')){
            $datosProceso['costo_actividad'] = $request->file('costo_actividad')->store('upload','public');
        }
        Procesos::insert($datosProceso);
        return redirect('proceso')->with('mensaje', 'El registro de la actividad fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procesos  $procesos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso = Procesos::findOrFail($id);
        $evidencia = '/registro-actividades/public/storage/'.$proceso->evidencia;
        $costo_actividad = '/registro-actividades/public/storage/'.$proceso->costo_actividad;
        return view('proceso.show', compact('proceso','evidencia', 'costo_actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procesos  $procesos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procesos = Procesos::findOrFail($id);
        return view('proceso.detail', compact('procesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procesos  $procesos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procesos $procesos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procesos  $procesos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procesos $procesos)
    {
        //
    }

    public function getActividades()
    {
        $actividades = Actividades::query()
        ->select(['id', 'nombre'])
        ->where('estado_registro', '=', 'A')
        ->orderBy('nombre','ASC')
        ->get();

        return $actividades;
    }

    public function getCanalAtencion()
    {
        $canalAtencion = CanalAtencion::query()
        ->select(['id', 'nombre'])
        ->where('estado_registro', '=', 'A')
        ->get();

        return $canalAtencion;
    }

    public function getSolicitante()
    {
        $solicitantes = Solicitantes::query()
        ->select(['id', 'nombre'])
        ->where('estado_registro', '=', 'A')
        ->orderBy('nombre','ASC')
        ->get();

        return $solicitantes;
    }

    public function getClientes()
    {
        $clientes = Clientes::query()
        ->select(['id', 'nombre'])
        ->where('estado_registro', '=', 'A')
        ->orderBy('nombre','ASC')
        ->get();

        return $clientes;
    }

    public function getTiempoInvertido()
    {
        $tiempos = TiempoInvertido::query()
        ->select(['id', 'nombre'])
        ->where('estado_registro', '=', 'A')
        ->get();

        return $tiempos;
    }

    public function export()
    {
        return Excel::download(new ProcesosExport, 'actividades-'.date('Y-m-d').'.xlsx');
    }
}
