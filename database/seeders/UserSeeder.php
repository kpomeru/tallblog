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

        User::factory(1)->create([
            'deleted_at' => null,
            'email' => env('ADMIN_EMAIL', 'super_admin@tallblog.test'),
            'email_verified_at' => now(),
            'password' => $password,
            'role' => 'super_admin',
        ]);

        User::factory(100)->create([
            'password' => $password
        ]);
    }
}
