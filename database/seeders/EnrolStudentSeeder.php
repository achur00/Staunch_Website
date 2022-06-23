<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EnrolStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrol_students')->insert([
            'first_name' => 'Sophia',
            'last_name' => 'Martins',
            'middle_name' =>  'Elena',
            'student_phone_number' => '08020000065',
            'student_email' => 'elena_sophia@gmail.com',
            'coursedetail_id' => 1,
            'mobile_dev_id' => 1,
            'sessionyear_id'=> 1, 
        ]);
    }
}
