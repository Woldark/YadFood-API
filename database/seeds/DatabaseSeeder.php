<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected  $index;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $index =0;
        $jdf = new \App\Libraries\JDF();

        factory(\App\Restaurant::class, 1)->create([
            'create_date' => $jdf->getTimestamp()
        ])->each(function (\App\Restaurant $restaurant) {
            $jdf = new \App\Libraries\JDF();
            factory(\App\Food::class, 21)->create([
                'restaurant_id'=>$restaurant->id,
                'create_date' => $jdf->getTimestamp()
            ]);
        });

        $dates = array();
        for ($i = 1; $i <= 31; $i++) {
            $date = "2018-08-" . $i . " 0:0:0";
            $d = Carbon::createFromTimeString($date);
            $dates[] = $d;
        }
        foreach ($dates as $date) {
            $str_date = explode(' ', (string)$date)[0];
            factory(\App\Day::class, 1)->create([
                'date' => $str_date,
                'create_date' => $jdf->getTimestamp()
            ])->each(function (\App\Day $day) {
                $day->foods()->attach($this->index * 3);
                $day->foods()->attach($this->index * 3 + 1);
                $day->foods()->attach($this->index * 3 + 2);
            });
            $this->index++;
        }


    }
}
