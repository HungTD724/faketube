<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Channel;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i<50; $i++){
            Channel::create([
                'channelName' => $faker ->name,
                'description' => $faker ->sentence(2),
                'subscribersCount' => $faker->numberBetween($min = 1, $max=20),
                'URL' => $faker->url,
            ]);
        }
    }
}
