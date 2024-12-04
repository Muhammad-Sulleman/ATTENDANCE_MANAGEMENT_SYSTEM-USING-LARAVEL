<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    public $timestamps = false; // Specify the table name

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'teacherid');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'studentid');
    }
}
