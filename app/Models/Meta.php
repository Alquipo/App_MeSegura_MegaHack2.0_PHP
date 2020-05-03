<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use \Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;

/**
 * Class Meta
 * @package App\Models
 * @version May 3, 2020, 5:00 am UTC
 *
 * @property \App\Models\Categoria $categoria
 * @property \App\Models\User $user
 * @property number $valor
 * @property integer $categoria_id
 * @property integer $user_id
 */
class Meta extends Model
{
    use SoftDeletes, Multitenantable;

    public $table = 'metas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'valor',
        'categoria_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'float',
        'categoria_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valor' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function setValorAttribute($value)
    {
                
        if(Str::contains($value, 'R$')){
            $resultado = str_replace(["R$ ", "."], "", $value);
            $resultado = str_replace(["," ], ".", $resultado);
        }
        else
            $resultado = $value;
         
        $this->attributes['valor'] = $resultado;
    }

    public function getValorMetaFormatadoAttribute()
    {
        return number_format($this->attributes['valor'], 2, ',', '.');
        
    }

   
}
