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
        $categories = factory(App\Category::class,5)->create();
        /*$challenges = factory(App\Challenge ::class,50)->create();
        $users = factory(App\User::class,15)->create();
        foreach ($challenges as $challenge) {
        $challenge->category()->associate($categories->random(1)->first()->id);
        $challenge->save();
        }
        foreach ($users as $user) {
          $user->followers()->sync($users->random(1));//->save($user);
          $user->following()->sync($users->random(1));
        }
        foreach ($challenges as $challenge){
          $challenge->user()->associate($users->random(1)->first()->id);
          $challenge->save();
        }*/
    }
}
