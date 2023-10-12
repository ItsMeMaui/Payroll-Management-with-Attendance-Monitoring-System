<!-- Main modal -->
<div id="adduserModalID" data-modal-backdrop="adduserModalID" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="adduserModalID">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Add User</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="../includes/signup.inc.php" method="POST">
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Select Role</label>
                        <select  name="emp_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value="">Select an admin</option>
                            <?php
                            while ($row = mysqli_fetch_array($result_employees)) { ?>
                                <option value='<?php echo $row[0] ?>'> <?php echo ucwords($row[2]) ?> <?php echo ucwords($row[3]) ?> <?php echo ucwords($row[4]) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Username</label>
                        <input type="text" name="emp_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Password</label>
                        <input type="password"  name="emp_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span>Confirm Password</label>
                        <input type="password"  name="emp_rpt_pwd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION["fname"] . " " . $_SESSION["mname"] . " " . $_SESSION["lname"] ?>" name="processed-by">
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                        <button data-modal-hide="adduserModalID" name="register_user" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add User</button>
                        <button data-modal-hide="adduserModalID" type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-red-600 dark:text-white dark:border-gray-500 dark:hover:text-white dark:hover:bg-red-700 dark:focus:ring-red-800">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>