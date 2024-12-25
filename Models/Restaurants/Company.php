<?php

namespace Models\Restaurants;

use Interfaces\FileConvertible;

class Company implements FileConvertible {
  public string $name;
  public int $foundingYear;
  public string $description;
  public string $website;
  public string $phone;
  public string $industry;
  public string $ceo;
  public bool $isPubliclyTraded;
  public string $country;
  public string $founder;
  public int $totalEmployees;

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
    int $totalEmployees
  )
  {
    $this->name = $name;
    $this->foundinfYear = $foundingYear;
    $this->website = $website;
    $this->phone = $phone;
    $this->industry = $industry;
    $this->ceo = $ceo;
    $this->isPubliclyTraded = $isPubliclyTraded;
    $this->country = $country;
    $this->founder = $founder;
    $this->totalEmployees = $totalEmployees;;
  }

  public function toString():string{
    return sprintf(
        "
        Company Name: %s\n
        Founding Year: %d\n
        Description: %s\n
        Website: %s\n
        Phone number: %s\n
        Industry: %s\n
        CEO: %s\n
        Publicliy Treade: %s\n
        Country: %s\n
        Founder: %s\n
        Total Employees: %d\n
        ",
        $this->name,
        $this->foundingYear,
        $this->description,
        $this->website,
        $this->phone,
        $this->industry,
        $this->ceo,
        $this->isPubliclyTraded ? 'Yes' : 'No',
        $this->country,
        $this->founder,
        $this->totalEmployees
    );
  }

  public function toHTML():string{
      return sprintf(
          "
          <div class='user-card'>
              <div class='avator'>SAMPLE</div>
              <h2>%s</h2> 
              <p>Founding Year: %d</p>
              <p>Description: %s</p>
              <p>Website: %s</p>
              <p>Phone Number: %s</p>
              <p>Industry: %s</p>
              <p>CEO: %s</p>
              <p>Publicly Trade: %s</p>
              <p>Country: %s</p>
              <p>Founder: %s</p>
              <p>Total Employees: %d</p>
          </div>
          ",
          $this->name,
          $this->foundingYear,
          $this->description,
          $this->website,
          $this->phone,
          $this->industry,
          $this->ceo,
          $this->isPubliclyTraded ? 'True' : 'False',
          $this->country,
          $this->founder,
          $this->totalEmployees
      );
  }

  public function toMarkdown(): string{
      return " ## Coompany Name: {$this->name}
                - Founding Year: {$this->foundingYear}
                - Description: {$this->description}
                - Website: {$this->website}
                - Phone number: {$this->phone} 
                - Industry: {$this->industry} 
                - CEO: {$this->ceo}
                - Publicly Treaded: {$this->isPubliclyTraded} 
                - Country: {$this->country} 
                - Founder: {$this->founder} 
                - Total Employees: {$this->totalEmployees} "; 
  }

  public function toArray(): array{
      return [
          "name" => $this->name,
          "foundingYear" => $this->foundingYear,
          "description" => $this->description,
          "website" => $this->website,
          "phone" => $this->phone,
          "industry" => $this->industry,
          "ceo" => $this->ceo,
          "isPubliclyTraded" => $this->isPubliclyTraded,
          "country" => $this->country,
          "founder" => $this->founder,
          "totalEmployees" => $this->totalEmployees
      ];
      
}
}