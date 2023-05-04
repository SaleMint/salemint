<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">



    <form action="/products" method="get">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input name="search" type="search" id="default-search" class="block w-full sm:px-50 p-4 pl-10 text-sm text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
         dark:focus:border-blue-500" placeholder="Search" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <div class="bg-white">
        <h2 class="text-2xl font-bold tracking-tight py-5 px-5 text-gray-900">Products in stock currentlly</h2>

        <div class="mx-auto max-w-2xl pt-5 px-4 sm:py-5 sm:px-6 lg:max-w-7xl lg:px-8">

            <div class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>

                        <div class="group relative">
                            <div class=" bg-transparent min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                <img src='img/<?= $product['id'] ?>.jpg' alt="<?= $Product['name'] ?>" class="h-full w-full  object-contain object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-base text-gray-900">
                                        <a href="/product?id=<?= $product['id'] ?>">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            <?= $product['name'] ?>
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500"><?= $product['description'] ?> </p>
                                </div>
                                <p class="text-sm font-medium text-gray-900"><?= $product['price'] ?></p>
                            </div>
                        </div>

                    <?php endforeach ?>

                    <?= count($products) == 0 ? "No Matches " : ""  ?>

                <?php endif; ?>



            </div>
        </div>



        <div class="flex flex-col items-center pb-20	">

            <div class="inline-flex mt-2 xs:mt-0">
                <!-- Buttons -->
                <a href="/products?page=<?= $current_page - 1 ?>" class=" <?= $current_page <= 1 ? 'invisible' : '' ?> inline-flex items-center cursor-pointer px-4 py-2 text-sm font-medium text-white  bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Prev
                </a>
                <!-- Buttons -->
                <button class="inline-flex items-center cursor-default px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700">
                    <?= $current_page ?>
                </button>
                <a href="/products?page=<?= $current_page + 1 ?>" class="<?= $current_page == $total_pages || $productsCount < 20 ? 'invisible' : '' ?> inline-flex cursor-pointer items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>


    </div>




    <?php require('partials/footer.php') ?>