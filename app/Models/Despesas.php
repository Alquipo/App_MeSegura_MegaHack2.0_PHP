<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Multitenantable;
use \Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



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
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
    public function getDataFormatadaAttribute($value)
    {
        return Carbon::parse($this->data)->format('d/m/Y');
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = Carbon::createFromFormat("d/m/Y", $value)->toDateString();;
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

    public function getValorDespesaFormatadoAttribute()
    {
        return number_format($this->attributes['valor'], 2, ',', '.');
        
    }

    protected static function boot()
    {
        parent::boot();

        Despesas::created(function ($despesa) {
            $user =  $despesa->user['id'];
        
            DB::table('users')->where('id', $user)->decrement('saldo', $despesa->valor);  
        });
        Despesas::updated(function ($despesa) {
            $user =  $despesa->user['id'];
        
            DB::table('users')->where('id', $user)->decrement('saldo', $despesa->valor);  
        });
        Despesas::deleted(function ($despesa) {
            $user =  $despesa->user['id'];
        
            DB::table('users')->where('id', $user)->increment('saldo', $despesa->valor);  
        });
    }
}
