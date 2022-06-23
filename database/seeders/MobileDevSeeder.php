<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobileDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobile_devs')->insert([
            'course_name' => 'Beginners',

            'course_description' => 'This entails the introduction to html, css, javascript and php  ',

            'curriculum' => json_encode( ['Introduction', 'intro  to Strings', 'intro to Variable', 'intro to Operator and operands','intro to Constant', 'intro to Conditional Statement','intro to Loop statement', 'intro to Regex', 'intro to Class','intro to Function','intro to MethodS', 'intro to Objects', 'intro to OOB' ]),

            'course_price' => 50000,
            'course_duration' => '2 months',
            'sessionyear_id'=> 1,],);


            DB::table('mobile_devs')->insert([
                'course_name' => 'Intermediate',
    
                'course_description' => 'This entails the introduction to html, css, javascript and php  ',
    
                'curriculum' => json_encode( ['Introduction', 'intro  to Strings', 'intro to Variable', 'intro to Operator and operands','intro to Constant', 'intro to Conditional Statement','intro to Loop statement', 'intro to Regex', 'intro to Class','intro to Function','intro to MethodS', 'intro to Objects', 'intro to OOB' ]),
    
                'course_price' => 50000,
                'course_duration' => '2 months',
                'sessionyear_id'=> 1,],);

                DB::table('mobile_devs')->insert([
                    'course_name' => 'Advance',
        
                    'course_description' => 'This entails the introduction to html, css, javascript and php  ',
        
                    'curriculum' => json_encode( ['Introduction', 'intro  to Strings', 'intro to Variable', 'intro to Operator and operands','intro to Constant', 'intro to Conditional Statement','intro to Loop statement', 'intro to Regex', 'intro to Class','intro to Function','intro to MethodS', 'intro to Objects', 'intro to OOB' ]),
        
                    'course_price' => 50000,
                    'course_duration' => '2 months',
                    'sessionyear_id'=> 1,],);
    }
}
