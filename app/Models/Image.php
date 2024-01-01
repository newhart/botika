<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'immageable_type', 'immageable_id'];

    public function immageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->image);
    }
}
