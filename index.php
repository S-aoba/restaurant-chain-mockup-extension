<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

$min = $_GET["min"] ?? 2;
$max = $_GET["max"] ?? 5;

$min = (int)$min;
$max = (int)$max;

$restaurants = Helpers\RandomGenerator::restaurantChains($min, $max);
?>

<!DOCTYPE html>
<html lang="ja" class="h-screen">
    <head>
        <title>Restaurant Chain Mock Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="w-screen h-full py-10">
      <div class="w-full maz-h-full flex flex-col items-center">
        <div class="max-w-screen-lg w-full">
          <div class="w-full flex flex-col space-y-5 mb-10">
            <!-- ここから動的に生成されたレストランの情報が入る -->
            <?php foreach($restaurants as $restaurant): ?>
              <?php echo $restaurant->toHTML(); ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </body>
</html>