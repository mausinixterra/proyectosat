<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

/**
 * Class ActividadeController
 * @package App\Http\Controllers
 */
class ActividadesController extends Controller
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
        Actividades::insert($datosProceso);
        return redirect('admin/actividades')->with('mensaje', 'El registro de la actividad fue creado con exito');
    }

    public function destroy($id)
    {
        Actividades::where('id', '=', $id)->update(['estado_registro' => 'I']);
        return redirect('admin/actividades')->with('mensaje', 'El registro de la actividad fue eliminado con exito');
    }

    public function update(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        Actividades::where('id', '=', $data['id'])->update(['nombre' => $data['nombre']]);
        return redirect('admin/actividades')->with('mensaje', 'El registro de la actividad fue actualizado con exito');
    }
}
