<?php
include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';
?>





<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
    <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-4xl">Schedules</h1>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Employee
                        </th>
                        <th scope="col " class="px-6 py-3">
                            Time In 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time Out
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attendance Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Hour
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Eleazar T. Sumaoi
                        </th>
                        <td class="px-6 py-4">
                            7:00
                        </td>
                        <td class="px-6 py-4">
                            5:00
                        </td>
                        <td class="px-6 py-4">
                            October 03, 2023
                        </td>
                        <td class="px-6 py-4 ">
                            10hrs
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Eleazar T. Sumaoi
                        </th>
                        <td class="px-6 py-4">
                            7:00
                        </td>
                        <td class="px-6 py-4">
                            5:00
                        </td>
                        <td class="px-6 py-4">
                            October 04, 2023
                        </td>
                        <td class="px-6 py-4 ">
                            10hrs
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Eleazar T. Sumaoi
                        </th>
                        <td class="px-6 py-4">
                            7:00
                        </td>
                        <td class="px-6 py-4">
                            5:00
                        </td>
                        <td class="px-6 py-4">
                            October 05, 2023
                        </td>
                        <td class="px-6 py-4 ">
                            10hrs
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php

include_once '../footer.php'
?>