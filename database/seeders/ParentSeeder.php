<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
            $my_parents = new My_Parent();
            $my_parents->Email = 'samir.gamal77@yahoo.com';
            $my_parents->Password = Hash::make('11111');
            $my_parents->Name_Father = 'سمير جمال';
            $my_parents->Employer = 'شركة ناتكو';
            $my_parents->Job_Phone = '01227788';
            $my_parents->Father_Phone = '777665544';
            $my_parents->Home_Phone = '01227788';
            $my_parents->Job_Father = 'مبرمج';
            $my_parents->Address_Father ='القاهرة';
            $my_parents->Name_Mother = 'سس';
            $my_parents->Phone_Mother = '777889900';
            $my_parents->Job_Mother = 'معلمة';
            $my_parents->save();

    }
}
