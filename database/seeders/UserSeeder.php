<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Cristian";
        $user->email = "cristian@gmail.com";
        $user->password = bcrypt("cristian12345");
        $user->save();

        $user2 = new User;
        $user2->name = "Andres";
        $user2->email = "andres@gmail.com";
        $user2->password = bcrypt("andres12345");
        $user2->save();
    }
}
