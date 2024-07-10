<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $fillable = ['immagine'];

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class);
    }
}
