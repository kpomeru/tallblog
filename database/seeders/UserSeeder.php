<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $password = Hash::make('Pa$$w0rd');

        foreach (['super_admin', 'admin', 'contributor', 'subscriber'] as $role) {
            User::factory()->create(
                [
                    'deleted_at' => null,
                    'email' => "{$role}@tallblog.test",
                    'email_verified_at' => now(),
                    'password' => $password,
                    'role' => $role,
                ]
            );
        }


        User::factory(100)->create([
            'password' => $password
        ]);
    }
}
