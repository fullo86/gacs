<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotCommend extends Model
{
    use HasFactory;

    protected $table = 'bot_commands';
    // protected $fillable = ['id', 'user_id', 'bot_id', 'status'];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'user_bot_command', 'bot_id', 'transaction_id')->withPivot('id', 'status', 'alias', 'bot_id');
    }
}
