<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=factory('App\Category')->create();
        $cid=$category->id;

        factory('App\User', 20)->create()->each(function($u)use($cid) {

            $post=factory('App\Post')->make([
                'category_id'=>$cid
            ]);
            
            $u->posts()->save($post);

            $post->comments()->save(factory('App\Comment')->make([
                'user_id'=>$u->id
            ]));

            $post->tags()->save(factory('App\Tag')->make());
        });
    }
}
