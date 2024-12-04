<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    public $timestamps = false;/// Specify the table name

    public function student()
    {
        return $this->belongsTo(user::class, 'studentid');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'classid');
    }
}
