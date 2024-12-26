<?php

require_once 'vendor/autoload.php';
// require_once 'RestaurantChain.php';
// require_once 'RandomGenerator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $employeeCount = $_POST['employee_count'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $minEmployeeSalary = $_POST['min_emoloyee_salary'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $maxEmployeeSalary = $_POST['max_emoloyee_salary'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $restaurantLocationCount = $_POST['restaurant_location_count'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $minZipCode = $_POST['min_zip_code'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $maxZipCode = $_POST['max_zip_code'] ?? ''; // 入力内容を取得（空の場合は空文字列）
  $fileType = $_POST['file_type'] ?? 'html'; // 入力内容を取得（空の場合は空文字列）

  // バリデーション
  // parameterがnullかどうかの判定
  if(
    is_null($employeeCount) || 
    is_null($minEmployeeSalary) || 
    is_null($maxEmployeeSalary) || 
    is_null($restaurantLocationCount) || 
    is_null($minZipCode) || 
    is_null($maxZipCode) || 
    is_null($fileType)
  ) {
    exit('Missing parameters');
  }

  // parameterの値の条件を判定
  if($employeeCount < 1 || $employeeCount > 100) {
    exit('Invalid count. Must be a number between 1 and 100.');
  }

  if($minEmployeeSalary < 1 || $minEmployeeSalary > 100) {
    exit('Invalid min employee salary. Must be a number between 1 and 100.');
  }

  if($maxEmployeeSalary < 1 || $maxEmployeeSalary > 100) {
    exit('Invalid max employee salary. Must be a number between 1 and 100.');
  }

  if($restaurantLocationCount < 1 || $restaurantLocationCount > 5) {
    exit('Invalid restaurant location count. Must be a number between 1 and 5.');
  }

  if($minZipCode < 1000 || $minZipCode > 5555) {
    exit('Invalid min zip code. Must be a number between 1000 and 5555.');
  }

  if($maxZipCode < 5556 || $maxZipCode > 9999) {
    exit('Invalid max zip code. Must be a number between 5556 and 9999.');
  }

  $fileTypeList = ['html', 'markdown', 'json', 'txt'];
  if(!in_array($fileType, $fileTypeList)) {
    exit('Invalid file type. The file type must be of type: HTML, Markdown, JSON or TXT.');
  }

  $min = $_POST['min'] ?? 2;
  $max = $_POST['max'] ?? 5;

  $min = (int)$min;
  $max = (int)$max;

  $restaurantChains = Helpers\RandomGenerator::restaurantChains(
    $min, 
    $max,
    $employeeCount,
    $minEmployeeSalary,
    $maxEmployeeSalary,
    $restaurantLocationCount,
    $minZipCode,
    $maxZipCode
  );
  // FileTypeによって処理を変える
  if ($fileType === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($restaurantChains as $restaurantChain) {
        echo $restaurantChain->toMarkdown();
    }
  } elseif ($fileType === 'json') {
      header('Content-Type: application/json');
      header('Content-Disposition: attachment; filename="users.json"');
      $restaurantChaninsArray = array_map(fn($restaurantChain) => $restaurantChain->toArray(), $restaurantChains);
      echo json_encode($restaurantChaninsArray);
  } elseif ($fileType === 'txt') {
      header('Content-Type: text/plain');
      header('Content-Disposition: attachment; filename="users.txt"');
      foreach ($restaurantChains as $restaurantChain) {
          echo $restaurantChain->toString();
      }
  } else {
      // HTMLをデフォルトに
      header('Content-Type: text/html');
      include 'toHTML.php';
  } 
} else {
  echo "POSTリクエストではありません。";
}
?>
