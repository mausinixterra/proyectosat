<?php

namespace App\Exports;

use App\Models\Procesos;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProcesosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datos = Procesos::query()
        ->select(['fecha_registro AS Fecha registro', 'fecha_actividad AS Fecha actividad', 'a.nombre AS actividad', 'descripcion AS Descripción','ca.nombre AS Canal atención', 's.nombre AS Solicitante', 'c.nombre AS Cliente', 'rp.nombre AS Realizado por', 'ti.nombre AS Tiempo invertido', 'valor_servicio AS Valor servicio', 'costo_actividad AS Costo actividad', 'evidencia AS Evidencia'])
        ->join('actividades AS a', 'procesos.actividades_id', '=', 'a.id')
        ->join('canal_atencion AS ca', 'procesos.canal_atencion_id', '=', 'ca.id')
        ->join('solicitantes AS s', 'procesos.solicitante_id', '=', 's.id')
        ->join('clientes AS c', 'procesos.cliente_id', '=', 'c.id')
        ->join('realizado_por AS rp', 'procesos.realizado_por_id', '=', 'rp.id')
        ->join('tiempo_invertido AS ti', 'procesos.tiempo_invertido_id', '=', 'ti.id')
        ->get();

        $datos[0] = array(
            "Fecha registro",
            "Fecha actividad",
            "actividad",
            "Descripción",
            "Canal atención",
            "Solicitante",
            "Cliente",
            "Realizado por",
            "Tiempo invertido",
            "Valor servicio",
            "Costo actividad",
            "Evidencia",
        );
        return $datos;
    }
}
