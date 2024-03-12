<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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

    protected $appends = [
        'limited_name',
        'limited_email',
        'limited_bio',
        'limited_location'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
