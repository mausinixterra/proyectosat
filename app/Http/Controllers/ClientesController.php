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
}
