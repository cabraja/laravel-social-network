<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
