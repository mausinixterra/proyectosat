<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CanalAtencion
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 * @property $estado_registro
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CanalAtencion extends Model
{
    public $table = "canal_atencion";
    
    static $rules = [
		'nombre' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];
}
