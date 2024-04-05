<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lists extends Model
{
    use HasFactory;

    protected $table = 'lists';
    protected $fillabel = [
        'name',
        'orderindex',
        'content',
        'assignee',
        'task_count',
        'due_date',
        'start_date',
        'archived',
        'override_statuses',
        'permission_level',
        // 'status_id',
        // 'priority_id',
        // 'folder_id',
        // 'space_id',
    ];
    protected $guarded = []; 
}
