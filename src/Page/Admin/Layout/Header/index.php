<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="http://localhost/php/dist/styles.css" rel="stylesheet"> <!-- Corrected path -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.3/css/all.min.css">

    <style>
    .hidden-text {
        display: none;
    }

    .transition-opacity {
        transition: opacity 0.2s ease;
    }
    </style>
</head>

<body>
    <div class="bg-gray-200 w-full flex flex-row ">
        <!-- Sidebar -->
        <div id="menu_bar" class="w-[20%] h-full bg-gray-200 flex flex-col gap-2">
            <div
                class="w-full h-10 flex flex-row gap-2 items-center font-bold text-xl px-2 bg-blue-300 hover:bg-blue-500">
                <span class="iconify w-7 h-7 hover:cursor-pointer" data-icon="ant-design:home-filled"
                    data-inline="false"></span>
                <h1 class="menu-title">Dashboard</h1>
            </div>

            <!-- Sidebar Links -->
            <?php 
            $menuItems = [
                ["icon" => "dashicons:category", "text" => "Category"],
                ["icon" => "streamline:decent-work-and-economic-growth-solid", "text" => "Sell"],
                ["icon" => "icon-park-outline:buy", "text" => "Purchase"],
                ["icon" => "icomoon-free:cart", "text" => "Cart"],
                ["icon" => "fontisto:product-hunt", "text" => "ProductUpdate"],
            ];

            foreach ($menuItems as $item) { 
            ?>
            <div class="flex flex-row gap-2 px-2 bg-gray-100 hover:bg-blue-500 text-xl font-bold transition-opacity">
                <span class="iconify w-7 h-7 hover:cursor-pointer" data-icon="<?= $item['icon']; ?>"
                    data-inline="false"></span>
                <h1 class="menu-title"><?= $item['text']; ?></h1>
            </div>
            <?php } ?>
        </div>

        <!-- Main Content Area -->
        <div class="w-full h-full flex flex-col gap-1 bg-gray-300 relative transition-width duration-1000">
            <!-- Icon Menu -->
            <div class="flex flex-row gap-1">
                <div class="w-32 h-10">
                    <span id="icon_menu"
                        class="iconify absolute left-4 top-0 w-7 h-7 bg-blue-500 hover:bg-blue-300 cursor-pointer"
                        data-icon="material-symbols:menu" data-inline="false"></span>
                </div>
                <div class=" w-full flex flex-row">
                    <!-- This allows the search area to take the remaining space -->
                   
                    <div class="w-full justify-end flex pr-10 items-center"> logout</div>

                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-grow p-4">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/php/src/Page/Admin/input.php'; // Using absolute path
                ?>
            </div>
        </div>

    </div>

    <script>
    // Select the elements
    const menu_bar = document.getElementById('menu_bar');
    const icon_menu = document.getElementById('icon_menu');
    const textElements = menu_bar.querySelectorAll('.menu-title'); // Corrected selector for menu titles
    const iconContainers = menu_bar.querySelectorAll('.flex-row');

    // Toggle width class on click
    icon_menu.addEventListener('click', function() {
        if (menu_bar.classList.contains('w-[20%]')) {
            // Change to narrow width
            menu_bar.classList.remove('w-[20%]');
            menu_bar.classList.add('w-20');
            textElements.forEach(text => text.classList.add('hidden-text')); // Hide text
            iconContainers.forEach(container => {
                container.classList.remove('justify-start'); // Remove left alignment
                container.classList.add('justify-center'); // Center the icons
            });
        } else {
            // Change to wide width
            menu_bar.classList.remove('w-20');
            menu_bar.classList.add('w-[20%]');
            textElements.forEach(text => text.classList.remove('hidden-text')); // Show text
            iconContainers.forEach(container => {
                container.classList.remove('justify-center'); // Remove center alignment
                container.classList.add('justify-start'); // Reset to left alignment
            });
        }
    });
    </script>
</body>

</html>