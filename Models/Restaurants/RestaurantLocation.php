<?php

namespace Models\Restaurants;

use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible {
  public string $name;
  public string $adress;
  public string $city;
  public string $state;
  public string $zipCode;
  /** @var Employee[] $employees */
  public array $employees;
  public bool $isOpen;

  public function __construct(
    string $name,
    string $adress,
    string $city,
    string $state,
    string $zipCode,
    array $employees,
    bool $isOpen
  )
  {
    $this->name = $name;
    $this->adress = $adress;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $zipCode;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
  }

  public function toString(): string{
    return sprintf(
        "
        Name: %s\n
        Address: %s\n
        City: %s\n
        State: %s\n
        Zip Code: %s\n
        Employees: %s\n
        Open: %s\n
        Drive-Through: %s\n
        ",
        $this->name,
        $this->address,
        $this->city,
        $this->state,
        $this->zipCode,
        $this->employees,
        $this->isOpen ? 'Yes' : 'No',
        $this->hasDriveThru ? 'Yes' : 'No'
    );
  }

  public function toHTML() : string {
    $employeeList = '';
    foreach($this->employees as $employee){
      $employeeList .= $employee->toHTML();
    }

    return sprintf(
      "
        <div class='w-full'>
          <div class='bg-blue-300/50 p-2'>
            <p class='text-blue-500 text-lg font-medium font-mono'>%s</p>
          </div>
          <div class='w-full py-2 px-8 flex flex-col space-y-3'>
            <p class='text-sm truncate'>Company Name: %s Address: %s Zip Code: %d</p>
            <hr class='my-2 border border-gray-500/80'>
            <h2 class='text-xl font-medium font-mono'>Employees: </h2>
            <ol class='mt-3'>
              %s
            </ol>
          </div>
        </div>
      ",
      $this->name,
      $this->name,
      $this->adress,
      $this->zipCode,
      $employeeList
    );
  }

  public function toMarkdown(): string{
    return "## Name: {$this->name} 
            - Address: {$this->address} 
            - City: {$this->city} 
            - State: {$this->state} 
            - Zip Code: {$this->zipCode} 
            - Employees: {$this->employees} 
            - Open: {$this->isOpen} 
            - Drive-Through: {$this->hasDriveThru}";
  }

  public function toArray(): array{
    return [
        "name" => $this->name,
        "address" => $this->address,
        "city" => $this->city,
        "state" => $this->state,
        "zipCode" => $this->zipCode,
        "employees" => $this->employees,
        "isOpen" => $this->isOpen,
        "hasDriveThru" => $this->hasDriveThru
    ];        
  }
}