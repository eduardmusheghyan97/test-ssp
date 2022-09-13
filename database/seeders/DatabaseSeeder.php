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

//        $now = (string)now();
//        while(true) {
//            $array = [];
//            $j = 0;
//                for ($i=0; $i<1000; $i++) {
//                    $j++;
//                    $array[] = [
//                        'website_id' => $j,
//                        'title' => 'tease',
//                        'description' => 'tease',
//                        'notified' => 0,
//                        'created_at' => $now,
//                        'updated_at' => $now
//                    ];
//                }
//                DB::table('posts')->insert($array);
//
//        }
    }
}
