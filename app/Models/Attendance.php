<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'attendances';

    // Disable timestamps if you don't want the created_at and updated_at columns
    public $timestamps = false;

    /**
     * Get the student associated with the attendance record.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'studentid');
    }

    /**
     * Get the class associated with the attendance record.
     */
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'classid');
    }
}
