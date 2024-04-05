<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillabel = [

            'name',
            'custom_id',
            'custom_item_id',
            'text_content',
            'description',
           // 'markdown_description',
            'status',
            'orderindex',
            'date_created',
            'date_updated',
            'date_closed',
            'date_done',
            'creator',
            'assignees',
            'watchers',
            'checklists',
            'tags',
            'parent',
            'priority',
            'due_date',
            'start_date',
            'time_estimate',
            'time_spent',
            'custom_fields',
            'list',
            'folder',
            'space'
    ];
    protected $guarded = []; 
}
