<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', '=', 'admin@gmail.com')->first();

        if($user == null)
        {
            $user = new User();

            $user->name = 'Super Admin';

            $user->email = 'admin@gmail.com';

            $user->password = Hash::make('11112222');

            $user->user_type = 1;

            $user->save();
        }
    }
}
