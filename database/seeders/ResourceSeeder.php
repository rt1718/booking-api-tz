<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resource::create([
            'name' => 'Велосипед',
            'type' => 'bike',
            'description' => 'Велосипед 21 скорость'
        ]);

        Resource::create([
            'name' => 'Самокат',
            'type' => 'scooter',
            'description' => 'Самокат обычный'
        ]);

        Resource::create([
            'name' => 'Велосипед bmx',
            'type' => 'bike',
            'description' => 'Велосипед bmx'
        ]);

        Resource::create([
            'name' => 'Скейтборд',
            'type' => 'skateboard',
            'description' => 'Скейтборд черного цвета'
        ]);
    }
}
