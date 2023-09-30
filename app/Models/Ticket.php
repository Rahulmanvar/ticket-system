<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ticket';
    
    protected $fillable = ['title', 'description', 'status', 'user_id', 'assigned_user_id'];

    public function user()
    {
        return $this->hasOne('\App\Models\User', 'id', 'user_id');
    }

    public function assigned()
    {
        return $this->hasOne('\App\Models\User', 'id', 'assigned_user_id');
    }
}
