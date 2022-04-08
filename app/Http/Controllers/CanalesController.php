<?php

namespace App\Http\Controllers;

use App\Models\CanalAtencion;
use Illuminate\Http\Request;

class CanalesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProceso = request()->except('_token');
        CanalAtencion::insert($datosProceso);
        return redirect('admin/canales')->with('mensaje', 'El registro del canal de atención fue creado con exito');
    }
}
