<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@jobsonhigh.com";
        $user->password = Hash::make('Admin@JobsOnHigh');
        $user->is_super_admin = 1;
        $user->save();
    }
}
