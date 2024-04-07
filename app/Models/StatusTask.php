<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTask extends Model
{
    use HasFactory;
    protected $table = 'status_tasks';
    protected $fillabel = [
        'id',
        'status',
        'color',
        'orderindex',
        'type',
    ];
    protected $guarded = [];
}
