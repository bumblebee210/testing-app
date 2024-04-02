<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Space extends Model
{
    use HasFactory;
    protected $table = 'spaces';
    protected $fillabel = [
        'name',
        'private',
        'color',
        'avatar',
        'admin_can_manage',
        'archived',
        'members',
        'statuses',
        'multiple_assignees',
        //'features',
        //'status_id'
    ];
    protected $guarded = []; 

    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }
}
