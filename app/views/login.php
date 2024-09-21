<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<body>
 <div class="flex justify-center items-center min-h-screen ">
        <div class="login-container  flex flex-col  justify-center items-center mt-10 bg-gray-200 ">
            <form method="POST" action="/php/src/login" class="p-10 w-96 ">
                <h2 class ="font-bold text-primary text-center text-2xl">Login form</h2>
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
            <p class="font-bold">Already have an account?
                <a href="/php/src/register" class=" no-underline hover:underline  hover:text-primary ">register here</a>.
            </p>
        </div>
    </div>

</body>

</html>