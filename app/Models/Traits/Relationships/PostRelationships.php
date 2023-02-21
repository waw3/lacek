<?php

namespace App\Models\Traits\Relationships;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PostRelationships.
 */
trait PostRelationships
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
