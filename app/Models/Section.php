<?php

namespace App\Models;

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
}
