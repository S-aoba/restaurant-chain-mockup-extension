<!DOCTYPE html>
<html lang="ja" class="h-screen">
    <head>
        <title>Restaurant Chain Mockup extension Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="w-screen h-full py-10">
      <div class="w-full maz-h-full flex flex-col items-center">
        <div class="max-w-screen-lg w-full">
          <div class="w-full flex flex-col space-y-5 mb-10">
            <form action="download.php" method="post" class="flex flex-col space-y-3">
              <label for="employee_count" class="text-sm font-semibold">従業員数 (1~5まで)</label>
              <input 
                class="p-2 border border-slate-400 w-full"
                type="number" 
                name="employee_count" 
                placeholder="従業員数を入力してください" 
                min=1
                max=5
                require
              >
              <span class="text-sm font-semibold">給与範囲 (1~100まで)</span>
              <div class="w-full flex  space-x-2">
                <label for="min_emoloyee_salary" class="text-sm font-semibold">最小</label>
                <input 
                  class="p-2 border border-slate-400 w-full"
                  type="number" 
                  name="min_emoloyee_salary" 
                  placeholder="従業員の最小給与範囲を入力してください" 
                  min=1
                  max=100
                  require
                >
                <label for="max_emoloyee_salary" class="text-sm font-semibold">最大</label>
                <input 
                  class="p-2 border border-slate-400 w-full"
                  type="number" 
                  name="max_emoloyee_salary" 
                  placeholder="従業員の最大給与範囲を入力してください" 
                  min=1
                  max=100
                  require
                >
              </div>
              <label for="restaurant_location_count" class="text-sm font-semibold">店舗数</label>
              <input 
                class="p-2 border border-slate-400 w-full"
                type="number" 
                name="restaurant_location_count" 
                placeholder="店舗数を入力してください" 
                min=1
                max=5
                require
              >
              <span class="text-sm font-semibold">郵便番号の範囲 (1000~9999)</span>
              <div class="w-full flex space-x-2">
                <label for="min_zip_code" class="text-sm font-semibold">最小</label>
                <input 
                  class="p-2 border border-slate-400 w-full"
                  type="number" 
                  name="min_zip_code" 
                  placeholder="郵便番号の最小範囲を選択してください" 
                  min=1000
                  max=9999
                  require
                >
                <label for="max_zip_code" class="text-sm font-semibold">最大</label>
                <input 
                  class="p-2 border border-slate-400 w-full"
                  type="number" 
                  name="max_zip_code" 
                  placeholder="郵便番号の最大範囲を選択してください" 
                  min=1000
                  max=9999
                  require
                >
              </div>
              <label for="file_type" class="text-sm font-semibold">生成したいファイル</label>
              <select 
                class="p-2 border border-slate-400 w-full"
                type="text" 
                name="file_type" 
                placeholder="生成したいファイルのタイプを選択してください"
                require
              >
              <option value="HTML">HTML</option>
              <option value="Markdown">Markdown</option>
              <option value="JSON">JSON</option>
              <option value="Text">Text</option>
            </select>
              <button type="submit" class="py-2 px-3 text-white bg-blue-400 text-sm rounded-md">送信</button>
            </form>
          </div>
        </div>
      </div>
    </body>
</html>