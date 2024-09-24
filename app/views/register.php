<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="http://localhost/php/dist/styles.css" rel="stylesheet"> <!-- Corrected path -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    
</head>

<body>
    <div class="flex justify-center items-center min-h-screen ">
        <div class="login-container  flex flex-col  justify-center items-center mt-10 bg-gray-200  rounded-md pb-10">

            <form method="POST" action="/php/src/register" class="p-10 w-96 ">
                <h2 class ="font-bold text-primary text-center text-2xl">Register form</h2>
                <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <div class=" flex flex-col gap-1    pt-4 ">
                    <label for="" class="font-bold"> user name</label>
                    <input type="text" name="username" placeholder="Username" required  class=" h-10 rounded-md">

                </div>
                <div class=" flex flex-col gap-1   pt-4 ">
                    <label for=" " class="font-bold">password</label>
                    <input type="password" name="password" placeholder="Password" required  class=" h-10 rounded-md">

                </div>
                <div class="flex flex-col gap-1 pt-4">
                    <label for="" class="font-bold" >Confirm password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required  class=" h-10 rounded-md">
                </div>

                <div class=" mt-10">
                    <button type="submit" class=" w-32 h-10 bg-primary rounded-md hover:bg-primary-100 font-bold">Register</button>

                </div>
            </form>
            <p class="  font-bold">Already have an account?
                <a href="/php/src/login" class=" no-underline hover:underline  hover:text-primary">Login here</a>.
            </p>
        </div>
    </div>
</body>

</html>