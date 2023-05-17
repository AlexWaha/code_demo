<?php

    namespace Database\Seeders;

    use App\Models\Project;
    use App\Models\Status;
    use App\Models\Task;
    use Illuminate\Database\Seeder;

    class DataSeeder extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            $project = Project::create([
                'title' => fake()->jobTitle(),
                'description' => fake()->text(),
            ]);

            $statuses = ['Todo', 'In Progress', 'Done'];

            foreach ($statuses as $name) {
                Status::create([
                    'name' => $name,
                ]);
            }

            for ($i = 0; $i < 3; $i++) {
                $status = Status::inRandomOrder()->first();
                Task::create([
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(),
                    'project_id' => $project->id,
                    'user_id' => '1',
                    'status_id' => $status->id,
                ]);
            }
        }
    }
