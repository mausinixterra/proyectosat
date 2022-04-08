<?php

namespace App\Http\Controllers;
use App\Models\Actividades;
use App\Models\CanalAtencion;
use App\Models\Clientes;
use App\Models\Solicitantes;
use App\Models\TiempoInvertido;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($admin)
    {
        switch ($admin) {
            case 'actividades':
                $listados = Actividades::paginate(10);
                return view("admin.actividades", compact('listados'));
            break;
            case 'canales':
                $listados = CanalAtencion::paginate(10);
                return view('admin.canales', compact('listados'));
            break;
            case 'solicitantes':
                $listados = Solicitantes::paginate(10);
                return view('admin.solicitantes', compact('listados'));
            break;
            case 'clientes':
                $listados = Clientes::paginate(10);
                return view('admin.clientes', compact('listados'));
            break;
            case 'tiempo':
                $listados = TiempoInvertido::paginate(10);
                return view('admin.tiempo', compact('listados'));
            break;
            case 'registrar':
                $listados = User::paginate(10);
                return view('admin.usuarios', compact('listados'));
            break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        //
    }
}
