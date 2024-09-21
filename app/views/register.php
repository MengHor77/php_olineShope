<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <form method="POST" action="/php/src/register">
            <h2>Register</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="/php/src/login">Login here</a>.</p>
    </div>
</body>
</html>
