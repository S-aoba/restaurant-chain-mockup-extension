<?php

namespace Models\Restaurants;

use Models\Restaurants\Company;
use Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
  public int $chainId;
  /** @var RestarurantLocation[] $restaurantLocations */
  public array $restaurantLocations; 
  public string $cuisineType;
  public int $numberOfLocations;
  public bool $hasDriveThru;
  public int $yearFounded;
  public string $parentCompany;

  public function __construct(
    string $name,
    int $foundingYear,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
    string $country,
    string $founder,
    int $totalEmployees,
    int $chainId,
    array $restaurantLocations, 
    string $cuisineType, 
    int  $numberOfLocations, 
    bool $hasDriveThru, 
    int $yearFounded, 
    string $parentCompany
  )
  {
    parent::__construct(
      $name,
      $foundingYear,
      $website,
      $phone,
      $industry,
      $ceo,
      $isPubliclyTraded,
      $country,
      $founder,
      $totalEmployees
    );
    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisineType = $cuisineType;
    $this->numberOfLocations = $numberOfLocations;
    $this->hasDriveThru = $hasDriveThru;
    $this->yearFounded = $yearFounded;
    $this->parentCompany = $parentCompany;
  }

  /** @return RestaurantLocation[] */
  public function getRestaurantLocations(): array {
    return $this->restaurantLocations;
  }

  public function toString(): string{
    return sprintf(
      "Chain ID: %s\n
        Restaurant Location: %s\n
        Cuisine Type: %s/n
        Number Of Locations: %d\n
        Parent Cmpany: %s\n",
      $this->chainId,
      $this->restaurantLocation,
      $this->cuisineType,
      $this->numberOfLocations,
      $this->parentCompany
    );        
  }

  public function toHTML() : string {
    $restaurantLocations = '';
    foreach($this->restaurantLocations as $location) {
      $restaurantLocations .= $location->toHTML();
    }

    return sprintf(
      " 
      <div>
        <div class='text-center py-2'>
          <h1 class='text-4xl font-medium font-mono'>Restaurant Chain %s</h1>
        </div>
        <div class='border border-gray-300'>
          <div class='bg-gray-400 text-white p-3'>
            <p>
              Restarurant Chain Information
            </p>
            </div>
            %s
        </div>
      </div>
      ",
      $this->name,
      $restaurantLocations,
    );
  }

  public function toMarkdown(): string{
    return " - Chain Id: {$this->chainId} 
        - Restaurant Location: {$this->restaurantLocation} 
        - Cuisine Type: {$this->cuisineType} 
        - Number Of Location: {$this->numberOfLocations} 
        - Parent Company: {$this->parentCompany}";    
  }

  public function toArray(): array{
    return [
      "chainId" => $this->chainId,
      "restaurantLocation" => $this->restaurantLocation,
      "cuisineType" => $this->cuisineType,
      "numberOfLocations" => $this->numberOfLocations,
      "parentCompany" => $this->parentCompany
    ];
  }
}