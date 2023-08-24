<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'message',
        'comment',
        'user_id',
        'status_id',
    ];

    protected $attributes = [
        'status_id' => '1',
    ];
}
