<?php

namespace Helpers;

use Faker\Factory;

use Models\Restaurants\RestaurantChain;
use Models\Restaurants\RestaurantLocation;
use Models\Users\Employee;

class RandomGenerator {
  public static function restaurantChains(
    int $min, 
    int $max,
    int $employeeCount,
    int $minEmployeeSalary,
    int $maxEmployeeSalary,
    int $restaurantLocationCount,
    int $minZipCode,
    int $maxZipCode
  ): array
  {
    $faker = Factory::create('ja-JP');
    $restaurantChains = [];
    $numberOfRestaurantChains = $faker->numberBetween($min, $max);

    for($i = 0; $i < $numberOfRestaurantChains; $i++) {
      $restaurantChains[] = self::restaurantChain($employeeCount, $minEmployeeSalary, $maxEmployeeSalary, $restaurantLocationCount, $minZipCode, $maxZipCode);
    }

    return $restaurantChains;
  }

  public static function restaurantChain(
    int $employeeCount, 
    int $minEmployeeSalary, 
    int $maxEmployeeSalary,
    int $restaurantLocationCount,
    int $minZipCode,
    int $maxZipCode
    ): RestaurantChain
  {
    $faker = Factory::create();

    $restaurantLocations = self::restaurantLocations($employeeCount, $minEmployeeSalary, $maxEmployeeSalary, $restaurantLocationCount, $minZipCode, $maxZipCode);

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
  public static function restaurantLocations(
    int $employeeCount, 
    int $minEmployeeSalary, 
    int $maxEmployeeSalary,
    int $restaurantLocationCount,
    int $minZipCode,
    int $maxZipCode
    ): array
    {
    $restaurantLocationList = [];

    for($i = 0; $i < $restaurantLocationCount; $i++) {
      $restaurantLocationList[] = self::restaurantLocation($employeeCount, $minEmployeeSalary, $maxEmployeeSalary, $minZipCode, $maxZipCode);
    }
    return $restaurantLocationList;
  }

  public static function restaurantLocation(
    int $employeeCount,
    int $minEmployeeSalary,
    int $maxEmployeeSalary,
    int $minZipCode,
    int $maxZipCode
    ): RestaurantLocation
    {
    $faker = Factory::create('ja-JP');

    return new RestaurantLocation(
      $faker->name,
      $faker->address,
      $faker->city,
      $faker->name,
      $faker->numberBetween($minZipCode, $maxZipCode),
      self::employees($employeeCount, $minEmployeeSalary, $maxEmployeeSalary),
      $faker->boolean
    );
  }

  /** @return Employee[] */
  public static function employees(
    int $employeeCount,
    int $minEmployeeSalary,
    int $maxEmployeeSalary
    )
    : array
    {
    $employeesList = [];

    for($i = 0; $i < $employeeCount; $i++) {
      $employeesList[] = self::employee($i+1, $minEmployeeSalary, $maxEmployeeSalary);
    }
    return $employeesList;
  }

  public static function employee(
    int $id, 
    int $minEmployeeSalary, 
    int $maxEmployeeSalary
    ) : Employee 
    {
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
      // salary
      $faker->randomFloat(4, $minEmployeeSalary, $maxEmployeeSalary),
      $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
      array($faker->randomElement(["Good design","Good taste", "Good Customer service"])),
    );
  }
}