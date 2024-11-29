<?php
session_start();
require __DIR__ . '/Connection.php';
require __DIR__ . '/Demand.php';


// // Enable error reporting for debugging (disable in production)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Ensure JSON is always returned
header('Content-Type: application/json');

// Prepare a default error response
$returnArr = [
    "ResponseCode" => "500",
    "Result" => "false",
    "title" => "Server Error",
    "message" => "An unexpected error occurred.",
];

// if ($count > 0) {
//     $_SESSION['carname'] = $username;

//     $returnArr = ["ResponseCode" => "200", "Result" => "true", "title" => "Login Successfully!", "message" => "welcome admin!!", "action" => "dashboard.php"];
// } else {
//     $returnArr = ["ResponseCode" => "200", "Result" => "false", "title" => "Please Use Valid Data!!", "message" => "welcome admin!!", "action" => "index.php"];
// }
// }


try {
    // Check if form data is submitted
    if (isset($_POST["type"])) {
        $type = $_POST['type'];

        if ($type === 'login') {
            // Retrieve form data
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Initialize the Demand class
            $demand = new Demand($car);

            // Check login credentials
            $count = $demand->carlogin($username, $password, 'admin');

            if ($count > 0) {
                // Successful login
                $_SESSION['carname'] = $username;
                $returnArr = [
                    "ResponseCode" => "200",
                    "Result" => "true",
                    "title" => "Login Successfully",
                    "message" => "Welcome admin !!!",
                    "action" => "dashboard.php"
                ];
            } else {
                // Invalid login
                $returnArr = [
                    "ResponseCode" => "400",
                    "Result" => "false",
                    "title" => "Login Failed",
                    "message" => "Invalid username or password.",
                    "action" => "index.php"
                ];
            }
        } else {
            // Unsupported type
            $returnArr = [
                "ResponseCode" => "400",
                "Result" => "false",
                "title" => "Invalid Request",
                "message" => "Unknown request type.",
            ];
        }
    } else {
        // No type specified in POST data
        $returnArr = [
            "ResponseCode" => "400",
            "Result" => "false",
            "title" => "Bad Request",
            "message" => "No type specified in the request.",
        ];
    }
} catch (Exception $e) {
    // Handle unexpected errors
    error_log($e->getMessage()); // Log error for debugging
    $returnArr = [
        "ResponseCode" => "500",
        "Result" => "false",
        "title" => "Exception Occurred",
        "message" => $e->getMessage(),
    ];
}

// Return the JSON response
echo json_encode($returnArr);
