<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $id1 = Str::random(30);
        $id2 = Str::random(30);
        DB::table('users')->insert([
            ['id'=> $id1 ,'name' => 'Budi', 'email' => 'budi@vascomm.com','password'=>bcrypt('123456')],
            ['id'=> $id2,'name' => 'Dina', 'email' => 'dina@vascomm.com','password'=>bcrypt('123456')]
        ]);
        
        DB::table('admins')->insert([
            ['userId'=>$id1,'name' => 'Budi'],
            ['userId'=>$id2,'name' => 'Dina']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
