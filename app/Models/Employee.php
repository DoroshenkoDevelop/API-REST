<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Models\Department','cat_id');
    }
    use HasFactory;
    protected $fillable = [
        'name',
        'lastName',
        'patronymic',
        'sex',
        'salary',
        'department',
        'cat_id'
    ];

}
