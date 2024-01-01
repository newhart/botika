<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable  = ['name', 'values'];

    protected $casts = [
        'values' => 'array',
    ];

    public function values(): HasMany
    {
        return $this->hasMany(ValueAttribute::class);
    }
}
