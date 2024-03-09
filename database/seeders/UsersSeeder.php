<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{

    private function genUser($detail = [
        'name' => '',
        'email' => '',
        'pass' => '',
        'role' => ''
    ])
    {
        $user = User::create([
            // 'id' => Str::uuid(),
            'name' => $detail['name'],
            'email' => $detail['email'],
            'password' => bcrypt($detail['pass'])
        ]);

        $role = Role::create([
            'name' => $detail['role'],
            'guard_name' => 'web'
        ]);

        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        $this->genUser([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'pass' => 'password',
            'role' => 'admin'
        ]);

        // supervisor
        $this->genUser([
            'name' => 'supervisor',
            'email' => 'supervisor@example.com',
            'pass' => 'password',
            'role' => 'supervisor'
        ]);

        // supervisor
        $this->genUser([
            'name' => 'reseller',
            'email' => 'reseller@example.com',
            'pass' => 'password',
            'role' => 'reseller'
        ]);

        // supervisor
        $this->genUser([
            'name' => 'customer',
            'email' => 'customer@example.com',
            'pass' => 'customer',
            'role' => 'customer'
        ]);
    }
}
