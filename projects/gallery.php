<?php
require_once("./template/header.php");
require_once("./template/sidebar.php");
?>

<section class="mt-5">
    <!-- Breadcrumb -->
    <ol class="flex items-center whitespace-nowrap py-2 mb-5 rounded-sm dark:bg-neutral-800">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="./gallery.php">
                Home
            </a>
            <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>

        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Gallery
        </li>
    </ol>
    <!-- End Breadcrumb -->

    <div class="bg-stone-100 w-full lg:w-1/2 px-5 py-8 rounded-sm dark:bg-neutral-800">
        <form action="./gallery-actions.php" method="post" enctype="multipart/form-data">
            <div class="flex flex-col gap-y-5">
                <div class="">
                    <label for="file-input" class="block text-sm font-medium mb-2  dark:text-white">Choose Photo</label>
                    <label for="file-input" class="sr-only">Choose file</label>
                    <input type="file" name="photos[]" multiple id="file-input" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                    file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4
                    dark:file:bg-neutral-700 dark:file:text-neutral-400">
                </div>

                <button type="submit" name="upload_btn" class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-sm border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Upload
                </button>
            </div>
        </form>
    </div>

</section>

<?php
$photos = array_filter(scandir("./images"), fn($el) => $el != "." && $el != "..");
// echo "<pre>";
// print_r($photos);
?>
<section>
    <div class="grid grid-cols-4 gap-4  mt-5">
        <?php foreach ($photos as $photo) : ?>
            <img src="./images/<?= $photo ?>" alt="Image" class="rounded">
        <?php endforeach; ?>
    </div>
</section>

<?php
require_once("./template/footer.php");
?>