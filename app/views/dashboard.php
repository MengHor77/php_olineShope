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
</head>
<body>
    <div>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h1>
    <a href="/php/src/logout">Logout</a>
    
    </div>
   
</body>
</html>
