<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>



<main>
    <div class="lg:flex w-full">
        <div class="mx-auto max-w-7xl py-2 sm:py-10 lg:px-8">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>


                        <section class="text-gray-600 body-font overflow-hidden bg-white">
                            <!-- div with two main divs-->
                            <div class="container ">


                                <div class="lg:w-4/5 mx-auto justify-center">

                                    <div class=" px-5 bg-transparent min-h-80 aspect-w-1 aspect-h-1 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-40">
                                        <a href="/product?id=<?= $product['id'] ?>">
                                            <img src='img/<?= $product['id'] ?>.jpg' loading="lazy" alt="<?= $product['name'] ?>" class=" h-1/2 object-contain lg:h-full lg:w-full">
                                        </a>
                                    </div>

                                    <div class=" px-5 lg:w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                        
                                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?= $product['name'] ?></h1>

                                        <p class="leading-relaxed"><?= $product['description'] ?></p>

                                        <h2 class="text-green-600 text-3xl title-font font-medium mb-1"><?= $product['price'] ?>$</h2>



                                        <div class="justify-end mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

                                            <div class=" flex ml-6 justify-center">
                                                <span class="mr-3 hidden">Qty</span>
                                                <div class=" hidden relative">
                                                    <select class="  rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>

                                                </div>
                                                <button onclick="remove(<?=$product['id']?>)" class="flex ml-10 text-white bg-red-800 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Remove item</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                <?php endforeach ?>

            <?php else : ?>
                <p class="text-2xl">No items added yet</p>

                <a class="pt-20 underline text-sky-400	text-lg	" href="/products">Go back to the store </a>

            <?php endif; ?>


        </div>

        <div class="w-1/4l  mx-auto max-w-7xl py-6 sm:px-15 lg:px-8">
            <p class="text-black-700   py-5  font-bold text-2xl">Subtotal(<?= empty($products) ? '0' : count($products) ?> item) : USD <?= $subtotal ?> </p>
            <button type="button" class="md:w-full sm:w-1/2 focus:outline-none text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Check out</button>

        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  
  function remove(_productId) {
    console.log("zopr")
    $.ajax({
        url: "cart",
        type: "POST",
        data: {
            productid: _productId
        },
        success: function(response) {
            location.reload();

        },
        error: function(xhr, status, error) {
            // Handle the error here
        }
    });
}

</script>
<?php require('partials/footer.php') ?>