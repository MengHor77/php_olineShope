<?php
if (!isset($_SESSION['user'])) {
    header('Location: /php/src/login');
    exit;
}

$controller = new ProductController();
$controller->index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="http://localhost/php/dist/styles.css" rel="stylesheet"> <!-- Corrected path -->
    
</head>
<body>
    
<?php
include_once 'comfirmLogout.php';
?>
</body>


</html>
