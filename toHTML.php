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
            <?php foreach($restaurantChains as $restaurantChain): ?>
              <?php echo $restaurantChain->toHTML(); ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </body>
</html>