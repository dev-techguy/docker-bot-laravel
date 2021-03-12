<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = array(
            'Sample writing',
            'Editing or rewriting'
        );

        foreach ($params as $param) {
            Service::query()->create([
                'name' => $param
            ]);
        }
    }
}
