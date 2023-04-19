<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private $roles = ['User', 'Admin'];

    public function run()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->insert([
                'name' => $role
            ]);
        }

        User::create([
            'username' => 'Admin2000',
            'email' => 'adminadmin@gmail.com',
            'password' => Hash::make('admin123'),
            'role_id' => 2
        ]);

        User::create([
            'username' => 'RegularJoe',
            'email' => 'regularjoe@gmail.com',
            'password' => Hash::make('user12345'),
            'role_id' => 1
        ]);
    }
}
