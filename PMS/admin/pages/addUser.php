<?php

include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>

<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 text-black dark:text-white h-screen">
    <div class="p-4 border-2 border-gray-200  mt-16 border-dashed rounded-lg dark:border-gray-700 ">

        <h1 class="text-4xl">Employees</h1>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <form action="../includes/signup.inc.php" method="POST" >
            <div class="mb-6">
                <label for="fnameID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your fname</label>
                <input type="text" id="fnameID" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="mnameID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your mname</label>
                <input type="text" id="mnameID" name="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="lnameID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your lname</label>
                <input type="text" id="lnameID"  name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="fingerprintID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your fingerprint</label>
                <input type="text" id="fingerprintID" name="fingerprint" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="roleID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your role</label>
                <input type="text" id="roleID" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
     

            <input type="hidden" value="eleazar sumaoi" name="processed-by">
            <div class="modal-footer mt-4  modal-body-color">

                <button type="submit" name="register" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>

            </div>
        </form>
    </div>
</div>