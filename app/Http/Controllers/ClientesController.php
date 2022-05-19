<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
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
        Clientes::insert($datosProceso);
        return redirect('admin/clientes')->with('mensaje', 'El registro del cliente fue creado con exito');
    }

    public function destroy($id)
    {
        Clientes::where('id', '=', $id)->update(['estado_registro' => 'I']);
        return redirect('admin/clientes')->with('mensaje', 'El registro del cliente fue eliminado con exito');
    }

    public function update(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        Clientes::where('id', '=', $data['id'])->update(['nombre' => $data['nombre']]);
        return redirect('admin/clientes')->with('mensaje', 'El registro del cliente fue actualizado con exito');
    }
}
