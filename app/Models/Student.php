<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dni',
        'birthday',
        'group'
    ];

    public function assists(){
        return $this->hasMany(Assist::class);
    }

    public function assist()
    {
    return $this->hasMany('App\Models\Assist', 'student_id');
    }

}
