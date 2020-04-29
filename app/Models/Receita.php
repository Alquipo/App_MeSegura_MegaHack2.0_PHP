<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;

/**
 * Class Receita
 * @package App\Models
 * @version April 29, 2020, 7:48 pm UTC
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
class Receita extends Model
{
    use SoftDeletes,Multitenantable;

    public $table = 'receitas';
    

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
}
