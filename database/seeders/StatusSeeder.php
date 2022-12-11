<?php

namespace Database\Seeders;

use App\Models\StatusApplication;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['id' => 1, 'slug' => 'read', 'title' => 'Прочитано'],
            ['id' => 1, 'slug' => 'not-read', 'title' => 'Очікує відповіді']
        ];

        foreach ($statuses as $status) {
            if (!StatusApplication::query()->where('slug', '=', $status['slug'])->exists()) {
                $createStatus = new StatusApplication();
                $createStatus['slug'] = $status['slug'];
                $createStatus['title'] = $status['title'];
                $createStatus->save();
            }
        }
    }
}
