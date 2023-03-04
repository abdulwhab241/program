<?php

namespace App\Models;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $genders = [];

    public function specializations()
    {
        return $this->belongsTo(Specialization::class,'Specialization_id');
    }
    
    public function genders()
    {
        return $this->belongsTo(Gender::class,'Gender_id');
    }

    // علاقة المعلمين مع الاقسام
    public function SectionsWith()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}
