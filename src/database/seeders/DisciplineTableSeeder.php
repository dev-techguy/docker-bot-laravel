<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = array(
            'Art',
            'Business and Management',
            'Computer science',
            'Economics',
            'Engineering', 'English and Literature', 'Health Care and Life Sciences', 'History', 'Humanities', 'Law', 'Marketing', 'Mathematics and Statistics',
            'Natural science', 'Philosophy', 'Political science', 'Psychology and Education', 'Religion / Theology', 'Social Sciences',
        );

        foreach ($params as $param) {
            Discipline::query()->create([
                'name' => $param
            ]);
        }
    }
}
