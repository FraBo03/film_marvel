<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $fillable = ['immagine'];
    
    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class);
    }
}
