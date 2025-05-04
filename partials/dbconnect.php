<?php

try {
    // Autoload dependencies
    require_once __DIR__ . '/vendor/autoload.php';
    echo "<script>alert('Autoload successful');</script>";
} catch (Throwable $e) {
    echo "<script>alert('Autoload failed: " . addslashes($e->getMessage()) . "');</script>";
    exit;
}

try {
    // Load .env file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    // Fetch environment variables
    $host = $_ENV['DB_HOST'] ?? null;
    $port = $_ENV['DB_PORT'] ?? 3306;
    $username = $_ENV['DB_USERNAME'] ?? null;
    $password = $_ENV['DB_PASSWORD'] ?? null;
    $database = $_ENV['DB_NAME'] ?? null;
    $ssl_ca = isset($_ENV['DB_SSL_CA']) ? realpath(__DIR__ . '/../' . $_ENV['DB_SSL_CA']) : null;
    echo "<script>alert('Resolved SSL CA path: " . addslashes($ssl_ca) . "');</script>";
    alert('Connection successful!');


    // Check if any required variable is missing
    if (!$host || !$username || !$password || !$database || !$ssl_ca) {
        echo "<script>alert('Error: One or more required environment variables are missing.');</script>";
        exit;
    }

    // Initialize MySQL connection with SSL
    $link = mysqli_init();
    if (!$link) {
        echo "<script>alert('MySQL initialization failed.');</script>";
        exit;
    }

    // Set SSL parameters
    if (!mysqli_ssl_set($link, NULL, NULL, $ssl_ca, NULL, NULL)) {
        echo "<script>alert('Error setting SSL parameters.');</script>";
        exit;
    }

    // Attempt to connect
    if (!mysqli_real_connect($link, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
        echo "<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>";
        exit;
    }

    echo "<script>alert('Connection successful!');</script>";

} catch (Exception $e) {
    echo "<script>alert('Unexpected error: " . addslashes($e->getMessage()) . "');</script>";
    exit;
}
?>
