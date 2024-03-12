<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatarUrl',
        'email',
        'bio',
        'location',
        'contributed_to',
        'filters'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
