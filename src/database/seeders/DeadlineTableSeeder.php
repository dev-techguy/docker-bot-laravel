<?php

namespace Database\Seeders;

use App\Models\Deadline;
use Illuminate\Database\Seeder;

class DeadlineTableSeeder extends Seeder
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
                '8',
                'hours'
            ),
            '8' => array(
                '24',
                'hours'
            ),
            '1' => array(
                '2',
                'days'
            ),
        );

        foreach ($params as $param => $param_value) {
            Deadline::query()->create([
                'from' => $param,
                'to' => $param_value[0],
                'metric' => $param_value[1]
            ]);
        }
    }
}
