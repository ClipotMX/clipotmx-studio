<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        //$this->call(UserSeeder::class);

        // Verificar si el usuario administrador ya existe antes de crear uno nuevo
        $admin = User::firstOrCreate(
            [
                'name' =>  'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
        );
        // Asignar el rol solo si el usuario fue recién creado
        if (!$admin->hasRole($adminRole)) {
            $admin->assignRole($adminRole);
        }

        // Verificar si el usuario normal ya existe antes de crear uno nuevo
        $user = User::firstOrCreate(
            [
                'name' =>  'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );
        // Asignar el rol solo si el usuario fue recién creado
        if (!$user->hasRole($userRole)) {
            $user->assignRole($userRole);
        }
    }
}
