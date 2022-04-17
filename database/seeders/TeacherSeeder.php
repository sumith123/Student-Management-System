<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_array = array
        (
          array(1,"Katie"),
          array(2,"Max"),
          array(3,"Louise"),
          array(4,"Philip")
        );
         foreach ($data_array as $key => $value) 
         {
          DB::table('teachers')->insert([
           'id' => $value[0],
           'teacher_name' => $value[1]
         ]);
          }	
    }
}
