<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<body>
    <div class="login-container w-full  h-full flex flex-col  justify-center items-center mt-10 ">
        <form method="POST" action="/php/src/login" class="bg-gray-300 p-10 w-96 ">
            <h2>Login</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="flex flex-col gap-1 pt-4">
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="flex flex-col gap-1 pt-4">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="mt-10">
                <button type="submit" class="w-32 h-10 bg-primary-100 rounded-md">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
