<?php

namespace App\Traits;

use App\Models\User;
use Faker\Factory;

trait UserTrait{
    public function setUsername()
    {
        $faker = Factory::create();
        
        do {
            $username = $faker->userName();
        } while (User::whereUsername($username)->first());

        return $username;
    }
}
