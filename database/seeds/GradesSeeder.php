<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $type = ['A','B','C','D','E','F','G','H'];

        for($i=0;$i<count($type);$i++)
        {
            DB::table('grades')->insert([
                'name' => 'VII'.$type[$i],
                'grade_level' => 10
            ]);

            DB::table('grades')->insert([
                'name' => 'VIII'.$type[$i],
                'grade_level' => 11
            ]);

            DB::table('grades')->insert([
                'name' => 'IX'.$type[$i],
                'grade_level' => 12
            ]);
        }

        DB::table('grades')->insert([
            'name' => 'VIIZ',
            'grade_level' => 10
        ]);
    }
}
