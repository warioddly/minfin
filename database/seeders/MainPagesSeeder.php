<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\MinFinContact;
use App\Models\Page;
use Illuminate\Database\Seeder;

class MainPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            'About the ministry',
            'Activity',
            'Documents',
            'Press center',
            'Anti-corruption policy',
            'Personnel policy',
        ];

        foreach ($pages as $page){
            Page::create([
                'title' => $page,
            ]);
        }

    }
}
