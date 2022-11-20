<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Consultant;
use App\Models\Executor;
use App\Models\ReportActivity;
use App\Models\SuperVisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++){
            $report = ReportActivity::create([
                'name_project' => fake()->name,
                'location' => fake()->address,
                'no_contractor' => fake()->phoneNumber,
                'work_date' => fake()->date,
                'execution_time' => fake()->dateTime,
                'maintenance_time' => fake()->dateTime,
                'fiscal_year' => fake()->year,
                'super_visor_id' => SuperVisor::inRandomOrder()->first()->id,
                'consultant_id' => Consultant::inRandomOrder()->first()->id,
                'executor_id' => Executor::inRandomOrder()->first()->id,
            ]);

            for ($j = 0; $j < 5; $j++){
                Comment::create([
                    'note' => fake()->paragraph,
                    'report_activity_id' => ReportActivity::inRandomOrder()->first()->id,
                    'user_id' => User::inRandomOrder()->first()->id
                ]);
            }
        }
    }
}
