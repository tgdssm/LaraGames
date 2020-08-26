<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Thalisson Gabriel';
        $user->nickname = 'femto';
        $user->email = 'thalissongabriel1999@gmail.com';
        $user->password = Hash::make('15101981');
        $user->type = 'administrator';
        $user->save();
    }
}
