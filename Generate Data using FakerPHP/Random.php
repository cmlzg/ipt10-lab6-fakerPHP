<?php

require 'vendor/autoload.php';

use Faker\Factory;

class Random
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en_PH'); 
    }

    public function generatePerson()
    {
        return [
            $this->faker->uuid,
            $this->faker->title,
            $this->faker->firstName,
            $this->faker->lastName,
            $this->faker->streetAddress,
            $this->faker->city, 
            $this->faker->city,
            $this->faker->state,
            $this->faker->country,
            $this->faker->phoneNumber,
            $this->faker->phoneNumber,
            $this->faker->company,
            $this->faker->domainName,
            $this->faker->jobTitle,
            $this->faker->safeColorName,
            $this->faker->date('Y-m-d'),
            $this->faker->email,
            $this->faker->password
        ];
    }
}
