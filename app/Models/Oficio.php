<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Oficio extends Model
{
    protected $table = 'oficios';

    protected $fillable = [
        'destino',
        'assunto',
        'data',
        'setor_id',
        'autorizado',
        'numero',
        'arquivos',
        'tipo',
        'numero_processo',
    ];

    public function getAutorizadoAttribute($value)
    {
        return $value ? 'sim' : 'não';
    }

    protected $casts =[
        'data' => 'date'
    ];
    public function getRoleAttribute($value)
    {
        return !empty($this->setor_id) ? User::ROLE[$this->setor_id] : 'Pesquisador';
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = $value;
    }

    public function getNumeroFormatadoAttribute()
    {

        $ano = date('y');


        $numeroFormatado = sprintf('%05d/%s', $this->attributes['numero'], $ano);


        if ($this->attributes['numero'] > 0) {
            return $numeroFormatado;
        } else {
            return '';
        }


    }
    public function setor(): BelongsTo
    {
    return $this->belongsTo(Setor::class);
    }

}
