<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;

    // public $translatble = ['Name'];
    protected $fillable = [
        'Name',
        'Notes'
    ];

    public function Sections()
    {
        return $this->hasMany(Section::class, 'Grade_id');
    }
}
