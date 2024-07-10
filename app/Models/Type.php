<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'id';

    public function films(): HasMany{
        return $this->hasMany(Film::class);
    }
}
