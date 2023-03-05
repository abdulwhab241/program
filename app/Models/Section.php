<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name_Class',
        'Grade_id',
        'Class_id',
        'Status',
    ];

    public function My_classes()
    {
        return $this->belongsTo(Classroom::class, 'Class_id');
    }

      // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
}
