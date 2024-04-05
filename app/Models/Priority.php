<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class priority extends Model
{
    use HasFactory;
    protected $table = 'prioritis';
    protected $fillabel = [
        'assignee',
        'task_count',
        'due_date',
        'start_date',
        
    ];
    protected $guarded = []; 
    
}
