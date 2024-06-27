<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Setor extends Model
{
    protected $table ='setores';

    protected $fillable =[
        'nome',
    ];

    public function oficios(): HasMany
    {
        return $this->hasMany(Oficio::class);
    }
}
