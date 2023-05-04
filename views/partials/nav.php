<?php

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$config = require('config.php');


if (isset($_COOKIE['jwt'])) {

    $decoded = JWT::decode($_COOKIE['jwt'], new key($config['JWT_SECRET'], 'HS512'));
    $payload = (array) $decoded;
    $result = new User;
    $user = $result->findbyid($payload['userid']);
}



?>
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="../../assets/logo.png" alt="Your Company">
                </div>



                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/products?search=Mobile+Phone" class="<?= urlIs('/products?search=Mobile+Phone') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mobile Phones</a>
                        <a href="/products?search=laptop" class="<?= urlIs('/products?search=laptop') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Laptop</a>
                        <a href="/products?search=tv" class="<?= urlIs('/products?search=tv') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">TV</a>
                        <a href="/products?search=Accessiories" class="<?= urlIs('/products?search=Accessiories') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Accessiories</a>

                    </div>
                </div>
            </div>



            <!-- Mobile-- the manu dropdown button  -->
            <div class="md:hidden">

                <button id="HideMenuButton" class="hidden inline-flex items-center p-2 text-sm font-medium text-center 
                 text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 
                 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800
                  dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">


                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>

                </button>

                <button id="ShowMenuButton" class="inline-flex items-center p-2 text-sm font-medium text-center 
                 text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 
                 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800
                  dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">

                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>


                </button>


            </div>


            <div class="hidden md:block">
                <div class=" <?= $user ?? "hidden" ?> ml-4 flex items-center md:ml-6">
                    <?= $user ? '<a href="/cart" type="button" class="  rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="flex-1 w-8 h-8 fill-current" viewbox="0 0 24 24">
                            <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                        </svg>

                    </a>' : '' ?>

                    <!-- Profile dropdown -->

                    <div class="relative ml-3">
                        <div>
                            <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown"> <?= $user['name'] ?? " " ?> <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg></button>

                            <!-- Dropdown menu -->
                            <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm">Profile</span>
                                    <span class="block text-sm font-medium text-gray-900 truncate"><?= $user['email'] ?? ""  ?></span>
                                </div>
                                <ul class="py-1" aria-labelledby="dropdown">
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                                    </li>

                                    <li>
                                        <a href="\logout" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                                    </li>
                                </ul>
                            </div>



                        </div>
                        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
                    </div>

                </div>

                <div class=" <?= $user ? "hidden" : "" ?> ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <a href="login" class="text-white bg-blue-700 hover:bg-blue-800
                              font-medium rounded-lg 
                             text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Sign in</a>





                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden hidden" id="mobile-menu">

            <div class="border-t border-gray-700 pt-4 pb-3">
                <div class="flex items-center ">

                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white"><?= $user['name'] ?? "" ?></div>
                        <div class="text-sm font-medium leading-none text-gray-400"><?= $user['email'] ?? "" ?></div>
                    </div>

                    <?= $user ?
                        '  <a href="cart" type="button" class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="flex-1 w-8 h-8 fill-current" viewbox="0 0 24 24">
                            <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                        </svg>
                    </a>' : '' ?>

                </div>
                <div class="mt-3 space-y-1 px-4">
                    <a href="#" class="block rounded-md px-2 py-4 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"><?= $user ? 'Your profile' : 'About Us' ?></a>


                    <a href=<?= $user ? '/logout' : '/login' ?> class="block rounded-md px-2 py-4 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"><?= $user ? 'Sign out' : 'Sign in' ?></a>
                </div>
            </div>
        </div>
</nav>

<script>
    const mobile_menu = document.getElementById("mobile-menu")
    //define the button for showing the menu which will also hide itself and show the button for hidding the menu
    document.getElementById("ShowMenuButton")
        .addEventListener('click', function() {
                mobile_menu.setAttribute("class", "visable md:hidden")
                document.getElementById("ShowMenuButton").setAttribute("class", "hidden");
                document.getElementById("HideMenuButton")
                    .setAttribute("class", "visible inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600")

            }

        );

    document.getElementById("HideMenuButton")
        .addEventListener('click', function() {

            mobile_menu.setAttribute("class", "hidden")
            document.getElementById("ShowMenuButton")
                .setAttribute("class", "visible inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600")

            document.getElementById("HideMenuButton")
                .setAttribute("class", "hidden")

        })
</script>