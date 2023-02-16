<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my__parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Father information
            $table->string('Name_Father'); // اسم الاب
            $table->string('Employer')->nullable(); // جهة العمل
            $table->string('Job_Father'); // الوظيفة
            $table->string('Father_Phone'); // هاتف الاب
            $table->string('Jop_Phone')->nullable(); // هاتف العمل
            $table->string('Home_Phone')->nullable(); // هاتف المنزل
            $table->string('Address_Father'); // العنوان

            //Mother information
            $table->string('Name_Mother');
            $table->string('Phone_Mother')->nullable();
            $table->string('Job_Mother');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my__parents');
    }
};
