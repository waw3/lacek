<?php

namespace App\Models\Traits\Relationships;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class UserRelationships.
 */
trait UserRelationships
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
