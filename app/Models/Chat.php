<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'body',
    ];

    protected $cast = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
