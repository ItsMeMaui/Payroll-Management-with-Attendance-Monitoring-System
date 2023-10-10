<!-- Main modal -->
<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl md:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Employee
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Add Employee</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 top-0">
                <form action="../includes/signup.inc.php" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex justify-center items-center flex-col gap-5">
                            <img id="inIm" src="../images/uploads/defaultProfile.jpg" alt="your image" class="rounded-full border-2 w-64 h-64" />
                            <div class="input-file ">
                                <input style="display: none;" accept="image/*" type="file" name="imageInput" id="imageInput" />
                                <a  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer" onclick="document.getElementById('imageInput').click();">
                                    Upload Image
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 md:ml-10">
                            <div class="border-t border-gray-200 rounded-b dark:border-gray-600 md:border-none">
                                <h3 class="text-2xl font-bold dark:text-white underline mt-5 uppercase" >basic information</h3>
                            </div>
                            <div class="flex flex-col md:flex-row gap-5">
                                <div>
                                    <label for="fnameID" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Firstname </label>
                                    <input type="text" id="fnameID" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="mnameID" class="block mb-2 text-md font-medium text-gray-900 dark:text-white ml-3">Middlename</label>
                                    <input type="text" id="mnameID" name="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="lnameID" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Lastname</label>
                                    <input type="text" id="lnameID" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            <div class="border-t border-gray-200 rounded-b dark:border-gray-600 md:border-none ">
                                <h3 class="text-2xl font-bold dark:text-white underline mt-5 uppercase" >additional information</h3>
                            </div>
                            <div class="flex flex-col md:flex-row gap-5">
                                <div>
                                    <label for="fingerprintID" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Your Fingerprint </label>
                                    <input type="text" id="fingerprintID" name="fingerprint" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="roleID" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Select Role</label>
                                    <select id="roleID" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled value="">-- Select Role --</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_roles)) { ?>
                                            <option value='<?php echo $row[0] ?>'><?php echo ucwords($row[1]) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div >
                                    <label for="roleIDvalue" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"><span class="text-red-500">*</span> Select Status</label>
                                    <select id="roleIDvalue" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled value="">-- Select Status --</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION["fname"] . " " . $_SESSION["mname"] . " " . $_SESSION["lname"] ?>" name="processed-by">
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 md:mt-10 justify-end">
                        <button data-modal-hide="staticModal" name="register_employee" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Employee</button>
                        <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white-900 focus:z-10 dark:bg-red-700 dark:text-white dark:border-gray-500 dark:hover:text-white dark:hover:bg-red-800 dark:focus:ring-red-800">Close</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->

        </div>
    </div>
</div>