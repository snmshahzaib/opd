<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Department extends Model
{
    protected $fillable = ['created_by','title'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'department_doctor', 'department_id', 'user_id');
    }
}
