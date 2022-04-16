<?php

namespace App\Http\Controllers;

use App\Models\Solicitantes;
use Illuminate\Http\Request;

class SolicitantesController extends Controller
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
        Solicitantes::insert($datosProceso);
        return redirect('admin/solicitantes')->with('mensaje', 'El registro del solicitante fue creado con exito');
    }

    public function destroy($id)
    {
        Solicitantes::where('id', '=', $id)->update(['estado_registro' => 'I']);
        return redirect('admin/solicitantes')->with('mensaje', 'El registro del solicitante fue eliminado con exito');
    }

    public function update(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        Solicitantes::where('id', '=', $data['id'])->update(['nombre' => $data['nombre']]);
        return redirect('admin/solicitantes')->with('mensaje', 'El registro del solicitante fue actualizado con exito');
    }
}
