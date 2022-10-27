<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'ticket_id', 'user_id'];

    /**
     * A Comment Belongs To a Ticket
     *
     */
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class);
    }

    /**
     * A Comment Belongs To a User
     *
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}