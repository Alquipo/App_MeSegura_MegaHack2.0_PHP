<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'saldo', 'idade', 'experiencia', 'poupacoins', 'nivel', 'ativo', 'celular'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function receitas()
    {
          return $this->hasMany('App\Models\Receita');
    }

    public function despesas()
    {
          return $this->hasMany('App\Models\Despesas');
    }

    public function setCelularAttribute($value)
    {
        if (Str::contains($value, '('))
        {
            $resultado = str_replace('(', '', $value);
            $resultado = str_replace(') ', '', $resultado);
            $resultado = str_replace('-', '', $resultado);

            $this->attributes['celular'] = $resultado;
        }
        else
        {
            $this->attributes['celular'] = $value;   
        }
    }
}
