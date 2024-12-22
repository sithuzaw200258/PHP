<?php
// echo "<pre>";
// print_r($_POST);
// var_dump($_POST);
if (empty($_POST['home_width']) || empty($_POST['home_breadth'])) {
    header("Location: ./index.php");
    exit;
}

$width = $_POST['home_width'];
$breadth = $_POST['home_breadth'];
$area = $width * $breadth;

$fileName = "area.txt";
if (!file_exists($fileName)) {
    touch($fileName);
}
$file = fopen($fileName, "a");
fwrite($file, "$width x $breadth = $area sqft\n");
fclose($file);

?>
<?php
require_once("./template/header.php");
require_once("./template/sidebar.php");
?>

<section class="mt-5">
    <!-- Breadcrumb -->
    <ol class="flex items-center whitespace-nowrap mb-5 rounded-sm dark:bg-neutral-800">
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
        <p class="text-3xl text-center mb-5 font-semibold text-indigo-600 dark:text-neutral-200">
            <?= $area; ?>
            sqft
        </p>

        <div class="flex items-center gap-x-5">
            <a href="./index.php" class="py-3 px-4 inline-flex flex-grow items-center justify-center gap-x-2 text-sm font-medium rounded-sm border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Calculate Again
            </a>

            <a href="./area-lists.php" class="py-3 px-4 inline-flex flex-grow items-center justify-center gap-x-2 text-sm font-medium rounded-sm duration-100 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white focus:outline-none focus:border-blue-600 focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:text-blue-500 dark:focus:border-blue-600">
                See Records
            </a>
        </div>
    </div>
</section>

<?php require_once("./template/footer.php"); ?>