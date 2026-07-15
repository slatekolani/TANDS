<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'name', 'email', 'phone', 'gender', 'age', 'school',
        'category', 'amount_paid', 'message',
    ];

    protected $casts = [
        'age' => 'integer',
        'amount_paid' => 'decimal:2',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
