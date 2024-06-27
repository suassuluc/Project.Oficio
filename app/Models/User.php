<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'mysql-fapema';

    protected $table = 'user';

    protected $primaryKey = 'int_UsuarioId';

    public $timestamps = false;

    protected $guarded = [
        'int_UsuarioId',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'str_Senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'int_UsuarioId'                     => 'integer',
        'str_Email'                             => 'string',
        'str_Senha'                         => 'string',
    ];


    const ROLE = [
    4 =>   "Informática",
    5 =>   "Bolsas",
    6 =>   "Auxílios",
    7 =>   "Administrativo",
    8 =>   "Financeiro",
    9 =>   "Presidente",
    10 =>  "comunicação",
    11 =>   "Prestação de Contas",
    12 =>   "Gabinete",
    13 =>   "Cie",
    14 =>   "Convênios",
    21 =>   "Rh",
    23 =>   "Jurídico",
    24 =>   "Ndc",
    25 =>   "Patrimônio",
    26 =>   "Biblioteca",
    27 =>   "Protocolo",
    28 =>   "DAF",
    29 =>   "Planejamento",
    30 =>   "Cap",
    31 =>   "Dir. Cientifica",
    32 =>   "Dir. Cientifica - Editais",];

    public function isAdmin()
    {
        return $this->role = 'Gabinete' && 'Informática' ;
    }

    public function getRoleAttribute()
    {
        return self::ROLE[$this->int_GrupoId] ?? 'Pesquisador';
    }

    public function getAuthPassword()
    {
        return $this->str_Senha;
    }
}
