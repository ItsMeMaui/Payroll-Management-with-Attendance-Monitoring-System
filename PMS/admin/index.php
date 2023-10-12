<?php

session_start();
include_once './classes/errors.classes.php';
$pageTitle = 'Login';
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap 5 CSS and JavaScript CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

    <!-- DataTables CSS and JavaScript CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Flowbite CSS and JavaScript CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <!-- Flowbite CSS and JavaScript CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <!-- Flowbite Datepicker CSS and JavaScript CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- own stylesheet -->
    <script src="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/styles.css">



</head>

<body>
<?php
  include_once 'components/modals/errors.php';
  
?>

  <div class=" h-screen w-full dark:bg-gray-800 flex flex-col justify-center items-center">

    <div class="md:w-[25%] w-[80%] lg:w-[25%] p-6 bg-white border-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 shadow-2xl">

      <img class="my-5 h-auto max-w-full p-6" src="./images/MRFLOGO.png">

      <form class="flex flex-col gap-5" method="POST" action="./includes/login.inc.php">
          <div>
              <div class="mb-6">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                  <input type="text" id="email" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </div>
              <div class="mb-6 relative">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                  <div class="relative">
                      <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <span id="passwordToggle" class="absolute top-0 right-0 flex items-center h-full px-3 cursor-pointer">
                          
                      </span>
                  </div>
              </div>
          </div>
          <div>
              <button type="submit" name="login_admin" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus-ring-blue-800">Login</button>
          </div>
      </form>

    </div>
  </div>

<script>
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');
    const svgPasswordVisible = '<svg class="w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512"><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"></path></svg>';
    const svgPasswordHidden = '<svg class="w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512"><path d="M413.1 356.7l94.2 94.2C491.3 457.4 512 421.3 512 384c0-53-43-96-96-96-37.3 0-73.4 20.7-126.9 58.9l30.3 30.3C292.4 293 288 288.7 288 284c0-26.5 21.5-48 48-48 4.7 0 9 4.4 11.2 8.2zM160 88c-77.3 0-140 62.7-140 140 0 61.7 88.3 154.9 134.5 200.2 3.1 3.1 8.2 3.1 11.3 0 3.1-3.1 3.1-8.2 0-11.3C113.3 390.5 32 269.9 32 228 32 150.7 94.7 88 172 88c51.3 0 100.4 33.6 128 56 27.6-22.4 76.7-56 128-56 77.3 0 140 62.7 140 140 0 37.8-77.9 158.4-121.3 201.8-3.1 3.1-8.2 3.1-11.3 0C307.9 393.1 320 334.7 320 268c0-26.5-21.5-48-48-48-25.7 0-51.3 20.7-128 76.9-76.6-56.2-115.9-141.8-115.9-179.9 0-77.3 62.7-140 140-140 77.3 0 140 62.7 140 140 0 39 68 167.4 115.9 215.1 2.6 2.4 6 3.6 9.4 3.6 3.4 0 6.8-1.3 9.4-3.6 5.2-4.8 5.5-13.1.7-18.3l-94.2-94.2c-13.1-13.1-34.4-13.1-47.5 0l-35.1 35.1-94.2-94.2c-4.8-4.8-13-4.9-18.1-.1z"></path></svg>';

    passwordToggle.innerHTML = svgPasswordHidden;

    passwordToggle.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.innerHTML = svgPasswordVisible;
        } else {
            passwordInput.type = 'password';
            passwordToggle.innerHTML = svgPasswordHidden;
        }
    });
</script>

</body>

</html>