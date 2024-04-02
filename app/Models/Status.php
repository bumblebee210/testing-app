<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Space;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $fillabel = [
        'status',
        'type',
        'orderindex',
        'color',
    ];
    protected $guarded = []; 

    public function spaces(){
        return $this->hasMany(Space::class);
    }
}
