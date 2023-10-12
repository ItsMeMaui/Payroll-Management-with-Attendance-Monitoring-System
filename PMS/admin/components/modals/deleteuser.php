<div id="deleteuserModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteuserModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
            	<form method="POST" action="../includes/delete.inc.php">
            		<input type="hidden" id="deleteuserID" name="delete_user_id">
            		<input type="hidden" id="deletepasswordID" name="delete_password">
            		<svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200 mt-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    	<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                	</svg>
	                <h3 class="mb-5 mt-5 text-lg font-normal text-gray-500 dark:text-gray-400">Delete Confirmation</h3>
	                <div class="mb-6">
                        <label for="emp_pwd" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">User Password</label>
                        <input type="password" name="entered_password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="flex gap-5 justify-center">
                    	<button data-modal-hide="deleteuserModal" name="delete_user" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
	                    Delete
	                	</button>
	                	<button data-modal-hide="deleteuserModal"  type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-red-600 dark:text-white dark:border-gray-500 dark:hover:text-white dark:hover:bg-red-700 dark:focus:ring-red-800">Cancel</button>
                    </div>

            	</form>
                
            </div>
        </div>
    </div>
</div>