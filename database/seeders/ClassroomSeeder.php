<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
                'الصف الاول',
                'الصف الثاني',
                'الصف الثالث',
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name_Class' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
