<?php

namespace App\Http\Controllers;

use App\Models\TiempoInvertido;
use Illuminate\Http\Request;

class TiempoController extends Controller
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
        TiempoInvertido::insert($datosProceso);
        return redirect('admin/tiempo')->with('mensaje', 'El registro del tiempo invertido fue creado con exito');
    }

    public function destroy($id)
    {
        TiempoInvertido::where('id', '=', $id)->update(['estado_registro' => 'I']);
        return redirect('admin/tiempo')->with('mensaje', 'El registro del tiempo invertido fue eliminado con exito');
    }

    public function update(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        TiempoInvertido::where('id', '=', $data['id'])->update(['nombre' => $data['nombre']]);
        return redirect('admin/tiempo')->with('mensaje', 'El registro del tiempo invertido fue actualizado con exito');
    }
}
