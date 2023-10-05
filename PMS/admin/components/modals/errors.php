
<?php
if (isset($_GET['error'])) {
    echo "
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";

    $errorMessage = $_GET['error'];

    // login error handler
    if ($errorMessage == "WrongInputPassword") {
        $modalMessage = "Wrong Input Password";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
    if ($errorMessage == "UserNotFound") {
        $modalMessage = "User Not Found";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };


    // query error handler

    if ($errorMessage == "StatementFailed") {
        $modalMessage = "Statement Failed";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    // missing input fields handler
    if ($errorMessage == "MissingSomeInputFields") {
        $modalMessage = "Please fill out all fields";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    // Employee error handler
    if ($errorMessage == "InvalidInputFname") {
        $modalMessage = "Invalid First Name";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    if ($errorMessage == "InvalidInputMname") {
        $modalMessage = "Invalid Middle Name";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    if ($errorMessage == "InvalidInputLname") {
        $modalMessage = "Invalid Last Name";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    if ($errorMessage == "loginsuccessfully") {
        $modalMessage = "Employee account has been created successfully!";
        $success = "Success";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-green-500', 'text-black','text-2xl');
                modalHeader.textContent = '$success';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };


    // User error handler
    if ($errorMessage == "InvalidUsername") {
        $modalMessage = "Invalid Username";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
    if ($errorMessage == "UsernameAlreadyTaken") {
        $modalMessage = "This username has already been taken ";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
    if ($errorMessage == "PasswordnotMatched") {
        $modalMessage = "The password confirmation does not match.";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    // roles error handler
    if ($errorMessage == "InvalidInputPositionName") {
        $modalMessage = "Invalid Position Name";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
    if ($errorMessage == "InvalidInputPositionRate") {
        $modalMessage = "Invalid Position Rate";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
    // logout handler
    if ($errorMessage == "logout") {
        $modalMessage = "You have successfully logged out.";
        $success = "Success";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-green-500', 'text-black','text-2xl');
                modalHeader.textContent = '$success';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    // login handler
    if ($errorMessage == "loginsuccessfully") {
        $modalMessage = "You have successfully logged in.";
        $success = "Success";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-green-500', 'text-black','text-2xl');
                modalHeader.textContent = '$success';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };

    if ($errorMessage == "loginrequired") {
        $modalMessage = "Login Required";
        $error = "Error";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modalmoulomo');
                modal.classList.remove('hidden');

                var modalHeader = modal.querySelector('.modal-header');
                modalHeader.classList.add( 'dark:text-red-500', 'text-black','text-2xl');
                modalHeader.textContent = '$error';

                // Update the modal message
                var modalBody = modal.querySelector('.modal-body');
                modalBody.classList.add( 'dark:text-white', 'text-black', );
                modalBody.textContent = '$modalMessage';
                
                var closeButton = modal.querySelector('[data-modal-hide]');
                closeButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>";
    };
}
