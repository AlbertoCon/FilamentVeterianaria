<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Owner extends Model
{
    public function patients(): HasMany //aqui en lo verde se pone el nombre en plural que las migraciones generaron
    {
        return $this->hasMany(Patient::class); //aqui en lo amarillo se pone el nonomre en singular donde decidimos llamarlo en la terminal
    }
}
