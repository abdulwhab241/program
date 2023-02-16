<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_Parent extends Model
{
    use HasFactory;

    protected $fillable = [
        'Email',
        'Password',
        'Name_Father',
        'Employer',
        'Job_Father',
        'Father_Phone',
        'Jop_Phone',
        'Home_Phone',
        'Address_Father',
        'Name_Mother',
        'Phone_Mother',
        'Job_Mother',
    ];
}
