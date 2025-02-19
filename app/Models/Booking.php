<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'resource_id',
        'user_id',
        'start_time',
        'end_time',
        'status',
    ];

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

}
