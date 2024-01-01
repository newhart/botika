<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adresse extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'pin_code', 'phone', 'type', 'author', 'user_id', 'email', 'first_name'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
