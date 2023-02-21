<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationships\BlogRelationships;

class Blog extends Model
{
    use HasFactory,
        BlogRelationships;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $fillable =[
        'title',
        'slug',
        'photo',
        'video',
        'content',
        'status',
        'user_id'
    ];
}
