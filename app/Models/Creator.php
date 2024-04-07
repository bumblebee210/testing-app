<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class creator extends Model
{
    use HasFactory;
    protected $table = 'creators';
    protected $fillabel = [
        'id_creator',
        'username',
        'color',
        'email',
        'profilePiture',
    ];
    protected $guarded = [];
}
