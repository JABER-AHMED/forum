<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'laravel', 'slug' => str_slug('laravel')];
        $channel2 = ['title' => 'Vue.js', 'slug' => str_slug('Vue.js')];
        $channel3 = ['title' => 'Angular.js', 'slug' => str_slug('Angular.js')];
        $channel4 = ['title' => 'CakePHP', 'slug' => str_slug('CakePHP')];
        $channel5 = ['title' => 'Bootstrap', 'slug' => str_slug('Bootstrap')];
        $channel6 = ['title' => 'HTML', 'slug' => str_slug('HTML')];
        $channel7 = ['title' => 'CSS', 'slug' => str_slug('CSS')];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
    }
}
