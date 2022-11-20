<?php

namespace Database\Seeders;

use App\Models\Consultant;
use App\Models\Executor;
use App\Models\SuperVisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerificatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<5;$i++){
            SuperVisor::create([
                'nip' => fake()->phoneNumber,
                'name' => fake()->name,
            ]);
            Consultant::create([
                'nip' => fake()->phoneNumber,
                'name' => fake()->name,
            ]);
            Executor::create([
                'nip' => fake()->phoneNumber,
                'name' => fake()->name,
            ]);
        }
    }
}
