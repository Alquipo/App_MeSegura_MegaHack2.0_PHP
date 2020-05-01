<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use \Carbon\Carbon;

/**
 * Class Despesas
 * @package App\Models
 * @version May 1, 2020, 2:18 am UTC
 *
 * @property \App\Models\Categoria $categoria
 * @property \App\Models\User $user
 * @property string $nome
 * @property number $valor
 * @property string $data
 * @property boolean $efetuada
 * @property integer $categoria_id
 * @property integer $user_id
 */
class Despesas extends Model
{
    use SoftDeletes,Multitenantable;

    public $table = 'despesas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'valor',
        'data',
        'efetuada',
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
        'nome' => 'string',
        'valor' => 'float',
        'data' => 'date',
        'efetuada' => 'boolean',
        'categoria_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'valor' => 'required',
        'data' => 'required'
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
    public function getDataFormatadaAttribute($value)
    {
        return Carbon::parse($this->data)->format('d/m/Y');
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = Carbon::createFromFormat("d/m/Y", $value)->toDateString();;
    }
}
