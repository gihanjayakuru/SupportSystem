<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $with = ['comments', 'comments.user'];


    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'description',
        'ref',
        'status',
    ];

    /**
     * A Ticket Has Many Comments
     *
     */
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function getLastCommentedAgentAttribute()
    {
        return $this->comments
            ->sortByDesc('created_at')
            ->whereNotNull('user')
            ->pluck('user')
            ->first();
    }
    
}