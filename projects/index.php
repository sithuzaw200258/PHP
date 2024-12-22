<?php
require_once("./template/header.php");
require_once("./template/sidebar.php");
?>

<section class="mt-5">
    <!-- Breadcrumb -->
    <ol class="flex items-center whitespace-nowrap py-2 mb-5 rounded-sm dark:bg-neutral-800">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="./index.php">
                Home
            </a>
            <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>

        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
            Area Calculator
        </li>
    </ol>
    <!-- End Breadcrumb -->

    <div class="bg-stone-100 w-full lg:w-1/2 px-5 py-8 rounded-sm dark:bg-neutral-800">
        <form action="./area.php" method="post">
            <div class="flex flex-col gap-y-5">
                <div class="">
                    <label for="home_width" class="block text-sm font-medium mb-2  dark:text-white">Home Width</label>
                    <input type="number" name="home_width" id="home_width" class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>
                <div class="">
                    <label for="home_breadth" class="block text-sm font-medium mb-2 dark:text-white">Home Breadth</label>
                    <input type="number" name="home_breadth" id="home_breadth" class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                </div>
                <button type="submit" name="calculate_btn" class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-sm border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Calculate Area
                </button>
            </div>
        </form>
    </div>
</section>

<?php
require_once("./template/footer.php");
?>