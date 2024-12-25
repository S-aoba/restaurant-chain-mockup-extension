<?php

namespace Models\Users;

use DateTime;
use Interfaces\FileConvertible;
use Models\Users\User;

class Employee extends User implements FileConvertible {
  public string $jobTitle;
  public float $salary;
  public string $startDate;
  /** @var string[] $awards */
  public array $awards;

  public function __construct(
    int $id,
    string $firstName, 
    string $lastName, 
    string $email,
    string $password, 
    string $phoneNumber, 
    string $address,
    DateTime $birthDate, 
    DateTime $membershipExpirationDate, 
    string $role,
    string $jobTitle,
    float $salary,
    string $startDate,
    array $awards
  )
  {
    parent::__construct(
      $id,
      $firstName,
      $lastName,
      $email,
      $password,
      $phoneNumber,
      $address,
      $birthDate,
      $membershipExpirationDate,
      $role
    );
    $this->jobTitle = $jobTitle;
    $this->salary = $salary;
    $this->startDate = $startDate;
    $this->awards = $awards;
  }

  public function toString():string{
    return sprintf(
        "Job Title: %d\n
         Salary: %d\n
         Start Date: %d\n
         Awards: %\n",
        $this->jobTitle,
        $this->salary,
        $this->startDate,
        $this->awards
    );
}

  public function toHTML() : string {
    return sprintf(
    "
      <li class='p-3 border border-gray-200 font-semibold w-full'>
        <p class='truncate'>ID: %d Job Title: %s Start Date: %s</p>
      </li>
    ",
      parent::getId(),
      $this->jobTitle,
      $this->startDate
    );
  }

  public function toMarkdown(): string{
    return "- Job Title: {$this->jobTitle}
          - Salary: {$this->salary}
          - Start Date: {$this->startDate}
          - Awards: {$this->awards}";        
  }

  public function toArray(): array{
    return [
        "Job Title" => $this->jobTitle,
        "Salary" => $this->salary,
        "Start Date" => $this->startDate,
        "Awards" => $this->awards
    ];
  }
}