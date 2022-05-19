<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    use HasFactory;

    public function realizadoPor()
    {
        return $this->hasOne('App\Models\RealizadoPor', 'id', 'realizado_por_id');
    }

    public function actividades()
    {
        return $this->hasOne('App\Models\Actividades', 'id', 'actividades_id');
    }

    public function canalAtencion()
    {
        return $this->hasOne('App\Models\CanalAtencion', 'id', 'canal_atencion_id');
    }

    public function solicitante()
    {
        return $this->hasOne('App\Models\Solicitantes', 'id', 'solicitante_id');
    }

    public function cliente()
    {
        return $this->hasOne('App\Models\Clientes', 'id', 'cliente_id');
    }

    public function TiempoInvertido()
    {
        return $this->hasOne('App\Models\TiempoInvertido', 'id', 'tiempo_invertido_id');
    }
}
