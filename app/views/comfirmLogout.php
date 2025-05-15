<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comfirm logout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="http://localhost/php/dist/styles.css" rel="stylesheet"> <!-- Corrected path -->
    
</head>
<body>
   <!--  use in  file input.php at admin page  -->

    <!-- Pop-up Confirmation -->
    <div class="fixed inset-0 hidden bg-gray-800 bg-opacity-50 flex justify-center items-center" id="show_logout">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-col items-center">
                <h1 class="text-lg font-semibold mb-4">Are you sure you want to logout?</h1>
                <div class="flex flex-row gap-4">
                    <a href="/php/src/logout" class="bg-red-400 text-white px-4 py-2 rounded-md hover:bg-red-500">Logout</a>
                    <h1 id="cancel" class="cursor-pointer bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                        Cancel
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <script>
        const logout = document.getElementById('logout');
        const show_logout = document.getElementById('show_logout');
        const cancel = document.getElementById('cancel');

        logout.addEventListener('click', function() {
            show_logout.style.display = 'flex'; 
        });

        cancel.addEventListener('click', function() {
            show_logout.style.display = 'none'; 
        });
    </script>
</body>

</html>