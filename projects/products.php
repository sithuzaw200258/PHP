<?php
require_once("./template/header.php");
require_once("./template/sidebar.php");
?>

<section class="mt-5">
  <!-- Breadcrumb -->
  <ol class="flex items-center whitespace-nowrap py-2 mb-5 rounded-sm dark:bg-neutral-800">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="./products.php">
        Home
      </a>
      <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </li>

    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
      Products
    </li>
  </ol>
  <!-- End Breadcrumb -->

  <div class="flex justify-end mb-5">
    <a href="./product-create.php" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      Create Product
    </a>
  </div>

  <div class="bg-stone-50 p-5 rounded-sm dark:bg-neutral-800">
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Image</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Price</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Rating</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <?php
                $productFolder = "./products";
                $products = array_filter(scandir($productFolder), fn($el) => $el !== '.' && $el !== '..');
                // echo "<pre>";
                // print_r($products);
                foreach ($products as $product) :

                  $json = file_get_contents($productFolder . "/" . $product);
                  $data = json_decode($json);
                  // print_r($data);

                ?>
                  <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                      <img src="<?= $data->product_photo ?>" alt="" class="w-10 h-10 object-cover object-center">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $data->product_name ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $data->product_price ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                      <div class="flex item-center gap-x-2">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="<?php echo $i <  $data->product_rating ? "#eab308" : "#d1d5db"; ?>" viewBox="0 0 24 24" stroke-width="1.5" stroke="<?php echo $i < $data->product_rating ? "#eab308" : "#d1d5db"; ?>" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                          </svg>
                        <?php endfor; ?>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                      <a href="./product-delete.php?file_name=<?= $product; ?>" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once("./template/footer.php");
?>