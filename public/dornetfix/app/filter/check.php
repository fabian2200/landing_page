<?php
// Start session
session_start();

// Security headers to prevent caching and XSS
header("Cache-Control: max-age=0, private, no-cache, no-store, must-revalidate");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self';");

// Suppress errors for security
error_reporting(0);

// Constants
define("LOG_FILE", "requests.log");
define("ALLOWED_ACTIONS", ['get_status', 'submit_data', 'fetch_logs']);

// Function to log requests
function logRequest($message)
{
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents(LOG_FILE, "[$timestamp] $message\n", FILE_APPEND | LOCK_EX);
}

// Function to validate input
function validateInput($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

// Function to handle get_status action
function getStatus()
{
    return json_encode([
        "status" => "success",
        "message" => "System is operational",
        "timestamp" => time(),
    ]);
}

// Function to handle submit_data action
function submitData($data)
{
    // Process incoming data
    if (!is_array($data) || empty($data)) {
        return json_encode([
            "status" => "error",
            "message" => "Invalid data submitted.",
        ]);
    }

    // Simulate data processing (e.g., saving to database)
    logRequest("Data submitted: " . json_encode($data));
    return json_encode([
        "status" => "success",
        "message" => "Data submitted successfully.",
    ]);
}

// Function to fetch logs securely
function fetchLogs()
{
    if (!file_exists(LOG_FILE)) {
        return json_encode([
            "status" => "error",
            "message" => "Log file not found.",
        ]);
    }

    $logs = file_get_contents(LOG_FILE);
    return json_encode([
        "status" => "success",
        "message" => "Logs fetched successfully.",
        "logs" => explode("\n", $logs),
    ]);
}

// Main script execution
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? validateInput($_POST['action']) : null;
    $data = isset($_POST['data']) ? json_decode($_POST['data'], true) : null;

    if (!$action || !in_array($action, ALLOWED_ACTIONS)) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid or missing action.",
        ]);
        exit();
    }

    // Execute action
    switch ($action) {
        case 'get_status':
            echo getStatus();
            break;
        case 'submit_data':
            echo submitData($data);
            break;
        case 'fetch_logs':
            echo fetchLogs();
            break;
        default:
            echo json_encode([
                "status" => "error",
                "message" => "Action not recognized.",
            ]);
            break;
    }
    exit();
} else {
    // Handle unauthorized access
    header("HTTP/1.1 403 Forbidden");
    echo json_encode([
        "status" => "error",
        "message" => "Access denied.",
    ]);
    exit();
}
?>
