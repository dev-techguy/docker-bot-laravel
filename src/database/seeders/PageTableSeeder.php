<?php

namespace Database\Seeders;

use App\Models\Deadline;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = array(
            '0' => array(
                '5',
                'pages'
            ),
            '6' => array(
                '10',
                'pages'
            ),
            '11' => array(
                '15',
                'pages'
            ),
        );

        foreach ($params as $param => $param_value) {
            Page::query()->create([
                'from' => $param,
                'to' => $param_value[0],
                'metric' => $param_value[1]
            ]);
        }
    }
}
