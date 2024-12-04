<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';
    // Add fillable property to allow mass assignment
    protected $fillable = ['teacherid', 'starttime', 'endtime', 'credit_hours'];
    public $timestamps = false;// Specify the table name

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'classid');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacherid');
    }
}
