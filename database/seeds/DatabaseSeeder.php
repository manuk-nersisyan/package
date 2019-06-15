<?php

use App\Package;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PackagesTableSeeder::class,
        ]);

        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->package()->save(factory(App\Package::class)->make());
        });
    }
}
