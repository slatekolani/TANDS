<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'email', 'message', 'source', 'is_read', 'email_sent'];

    protected $casts = [
        'is_read' => 'boolean',
        'email_sent' => 'boolean',
    ];
}
