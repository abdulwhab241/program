<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model 
{

    protected $fillable = [
        'Name_Class',
        'Grade_id'
    ];


    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

}