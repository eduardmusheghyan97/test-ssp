<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        App\Models\User::factory(10)->create();
        Website::factory(10)->create();
    }
}
