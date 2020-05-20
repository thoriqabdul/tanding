<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = new \App\User;
        $new_user->name = "Admin";
        $new_user->email = "Admin@gmail.com";
        $new_user->password =bcrypt('secret');
        $new_user->save();
    }
}
