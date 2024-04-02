<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'features';
    protected $fillabel = [
        'due_dates',
        'time_tracking',
        'tags',
        'time_estimates',
        'checklists',
        'custom_fields',
        'remap_dependencies',
        'dependency_warning',
        'portfolios',
    ];
    protected $guarded = []; 
}
