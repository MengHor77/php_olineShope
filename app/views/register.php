<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<body>
    <div class="flex justify-center items-center min-h-screen ">
        <div class="login-container  flex flex-col  justify-center items-center mt-10 bg-gray-200 ">

            <form method="POST" action="/php/src/register" class="p-10 w-96 ">
                <h2 class ="font-bold text-primary text-center text-2xl">Register form</h2>
                <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <div class=" flex flex-col gap-1    pt-4 ">
                    <label for=""> user name</label>
                    <input type="text" name="username" placeholder="Username" required>

                </div>
                <div class=" flex flex-col gap-1   pt-4 ">
                    <label for=" ">password</label>
                    <input type="password" name="password" placeholder="Password" required>

                </div>
                <div class="flex flex-col gap-1 pt-4">
                    <label for="">Confirm password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>

                <div class=" mt-10">
                    <button type="submit" class=" w-32 h-10 bg-primary-100 rounded-md ">Register</button>

                </div>
            </form>
            <p class="  font-bold">Already have an account?
                <a href="/php/src/login" class=" no-underline hover:underline  hover:text-primary">Login here</a>.
            </p>
        </div>
    </div>
</body>

</html>