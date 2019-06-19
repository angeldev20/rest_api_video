<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function ($user) {
            // Seed the relation with 5 purchases
            // $videos = factory(App\Video::class, 5)->make();
            // $user->videos()->saveMany($videos);
            // $user->videos()->each(function ($video){
            // 	$video->videometa()->save(factory(App\VideoMeta::class)->make());
            // 	// :(   
            // });
            factory(App\User::class, 10)->create()->each(function ($user) {
			    factory(App\Video::class, 5)->create(['user_id' => $user->id])->each(function ($video) {
			    	factory(App\VideoMeta::class, 1)->create(['video_id' => $video->id]);
			        // $video->videometa()->save(factory(App\VideoMeta::class)->create(['video_id' => $video->id]));
			    });
			});

        });
    }
}

