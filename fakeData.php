<?php
use Faker\Factory;

// Creating user name and lastname from Faker
function getFakeData(int $count)
{
    $data = array(); // = [];
    for ($i = 1; $i <= $count; $i++) {
        $faker = Factory::create();
        $data[] =
            [
                'name' => $faker->name,
                'lastname' => $faker->lastName
            ];
    }
    return $data;
}