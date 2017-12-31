<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Picture::class, 10)->create()->each(function ($u) {
            for ($i=0; $i<10; $i++){
                $u->captions()->save(factory(App\Caption::class)->make());
            }
        });
    }
}
