<?php
if (isset($_GET['error'])) {
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';

    $errorMessage = $_GET['error'];
    $modalClass = 'bg-danger';
    $modalTitle = 'Error';
    $modalMessage = '';

    switch ($errorMessage) {
        case 'UsernameAlreadyTaken':
            $modalMessage = 'Username Already Taken';
            break;
        case 'StatementFailed':
            $modalMessage = 'Statement Failed';
            break;
        case 'UserNotFound':
            $modalMessage = 'User Not Found';
            break;
        case 'WrongInputPassword':
        	$modalClass = "fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full";
            $modalMessage = 'Wrong Input Password';
            break;
        case 'PasswordDoesNotMatch':
            $modalMessage = 'Password does not match';
            break;
        case 'loginsuccessfully':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You Have Successfully Logged In To Dashboard';
            break;
        case 'createddadmin':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully created an Account';
            break;
        case 'weakpassword':
            $modalMessage = 'Password must be at least 8 characters';
            break;
        case 'createdresident':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully created a Resident account';
            break;
        case 'updatedadmin':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully updated an Admin account';
            break;
        case 'updatedresident':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully updated a Resident account';
            break;
        case 'deletedadmin':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully deleted an Admin account';
            break;
        case 'deletedresident':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully deleted a Resident account';
            break;
        case 'logout':
            $modalClass = 'bg-success';
            $modalTitle = 'Success';
            $modalMessage = 'You have successfully logged out!';
            break;
        case 'EmailAlreadyTaken':
            $modalMessage = 'Email Already Taken';
            break;
        case 'WrongQrCode':
            $modalMessage = 'Wrong Qr Code';
            break;
        case 'InvalidInputFname':
            $modalMessage = 'Invalid Input First Name';
            break;
        case 'InvalidInputMname':
            $modalMessage = 'Invalid Input Middle Name';
            break;
        case 'InvalidInputLname':
            $modalMessage = 'Invalid Input Last Name';
            break;
        case 'InvalidInputSpname':
            $modalMessage = 'Invalid Input Spouse Name';
            break;
        case 'InvalidInputSpouseOcc':
            $modalMessage = 'Invalid Input Spouse Occupation';
            break;
        case 'InvalidInputCityAdd':
            $modalMessage = 'Invalid Input City Address';
            break;
        case 'InvalidInputProvAdd':
            $modalMessage = 'Invalid Input Province Address';
            break;
        case 'InvalidInputPurok':
            $modalMessage = 'Invalid Input Purok';
            break;
        case 'InvalidInputCategoryName':
            $modalMessage = 'Invalid Input Category Name';
            break;
        case 'InvalidInputProductName':
            $modalMessage = 'Invalid Input Product Name';
            break;
        case 'InvalidInputProductPrice':
            $modalMessage = 'Invalid Input Product Price';
            break;
        case 'cashiertimeloginerror':
            $modalMessage = 'Sorry, the store is currently closed. Please try again during our business hours (7:30am-5:00pm) on weekdays and Saturdays only.';
            break;
        case 'admintimeloginerror':
            $modalMessage = 'Sorry, the store is currently closed. Please try again during our office hours (7:30am-5:00pm) on weekdays and Saturdays only.';
            break;
        case 'teacherstafftimeloginerror':
            $modalMessage = 'Sorry, the store is currently closed. Please try again during our business hours (8:30am-4:30pm) on weekdays and Saturdays only.';
            break;
    }

    if (!empty($modalMessage)) {
        echo '<script>
            $(function() {
                var modal = $("#modalmoulomo");
                modal.find(".modal-header").addClass("' . $modalClass . '");
                modal.find(".modal-title").text("' . $modalTitle . '");
                modal.find(".modal-body").text("' . $modalMessage . '");
                modal.find(".modal-body").addClass("fw-bold");
                modal.modal("show");
            });
        </script>';
    } else {
        echo '<div class="text-center mt-4">
            <h1 class="text-2xl font-bold">Welcome to SalesPoint. Please login to continue</h1>
            <p class="text-lg">
                Have a nice day!
            </p>
        </div>';
    }
}
?>
