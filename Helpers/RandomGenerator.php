<?php

namespace Helpers;

use Faker\Factory;

use Models\Restaurants\RestaurantChain;
use Models\Restaurants\RestaurantLocation;
use Models\Users\Employee;

class RandomGenerator {
  public static function restaurantChains(int $min, int $max): array
  {
    $faker = Factory::create('ja-JP');
    $restaurantChains = [];
    $numberOfRestaurantChains = $faker->numberBetween($min, $max);

    for($i = 0; $i < $numberOfRestaurantChains; $i++) {
      $restaurantChains[] = self::restaurantChain();
    }

    return $restaurantChains;
  }

  public static function restaurantChain(): RestaurantChain
  {
    $faker = Factory::create();

    $restaurantLocations = self::restaurantLocations();

    return new RestaurantChain(
      $faker->company,                 // name
      $faker->numberBetween(1900, 2023), // foundingYear
      $faker->url,                     // website
      $faker->phoneNumber,             // phone
      $faker->word,                    // industry
      $faker->name,                    // ceo
      $faker->boolean,                 // isPubliclyTraded
      $faker->country,                 // country
      $faker->name,                    // founder
      count($restaurantLocations),     // totalEmployees
      $faker->randomNumber(),          // chainId
      $restaurantLocations,             // restaurantLocations
      $faker->word,                    // cuisineType
      $faker->numberBetween(1, 500),   // numberOfLocations
      $faker->boolean,                 // hasDriveThru
      $faker->numberBetween(1900, 2023), // yearFounded
      $faker->company,                 // parentCompany
    );
  }

  /** @return RestaurantLocation[] */
  public static function restaurantLocations(): array{
    $restaurantLocationList = [];
    $randomRestaurantLocationCount = mt_rand(1, 5);

    for($i = 0; $i < $randomRestaurantLocationCount; $i++) {
      $restaurantLocationList[] = self::restaurantLocation();
    }
    return $restaurantLocationList;
  }

  public static function restaurantLocation(): RestaurantLocation{
    $faker = Factory::create('ja-JP');

    return new RestaurantLocation(
      $faker->name,
      $faker->address,
      $faker->city,
      $faker->name,
      $faker->numberBetween(1000, 9999),
      self::employees(),
      $faker->boolean
    );
  }

  /** @return Employee[] */
  public static function employees(): array{
    $employeesList = [];
    $randomEmployeeCount = mt_rand(1, 5);

    for($i = 0; $i < $randomEmployeeCount; $i++) {
      $employeesList[] = self::employee($i+1);
    }
    return $employeesList;
  }

  public static function employee(int $id) : Employee {
    $faker = Factory::create('ja-JP');

    date_default_timezone_set('Asia/Tokyo');
    return new Employee(
      $id,
      $faker->firstName,
      $faker->lastName,
      $faker->email,
      $faker->password,
      $faker->phoneNumber,
      $faker->address,
      $faker->dateTime,
      $faker->dateTimeBetween('-10 years','+20 years'),
      $faker->randomElement(['admin','user','editor']),
      $faker->randomElement(['Chef','Cashier','Server','Cooking Assitance']),
      $faker->randomFloat,
      $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
      array($faker->randomElement(["Good design","Good taste", "Good Customer service"])),
    );
  }
}