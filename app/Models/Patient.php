<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    public function owner(): BelongsTo //esto significa que solo puede tener un dueño
    {
        return $this->belongsTo(Owner::class);
    }
 
    public function treatments(): HasMany //esto signidica que puede tener muchos tratamientos
    {
        return $this->hasMany(Treatment::class);
    }

}
