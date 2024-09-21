<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Public Site</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <!-- <link href="../../../../../dist/styles.css" rel="stylesheet"> -->
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<body>

    <div class="w-full flex flex-col">
        <!-- Header Section -->
        <div class="w-full bg-gray-100 flex flex-row gap-10 justify-between items-center px-10 relative">
            <!-- Logo Section -->
            <div class="w-1/5 h-20 flex justify-center items-center py-2">
                <a href="/php/src/">
                    <!-- Add this link -->
                    <img class="w-32 h-full" src="http://localhost/php/src/Page/Picture/logo/logo.png" alt="logo">
                </a>
            </div>


            <!-- import SearchBar.php Section -->
            <?php include 'search.php'; ?>

            <!-- QR Section, flag, account -->
            <div class="w-1/5  flex flex-row gap-4 justify-center  relative ">
                <!-- Dropdown Trigger Flag (Initially UK) -->
                <img class="w-7 h-7 cursor-pointer rounded-2xl" id="dropFlagBtn"
                    src="http://localhost/php/src/Page/Picture/flag/united_kingdom.png" alt="Selected Flag">

                <!-- QR Code Icon -->
                <span class="iconify w-7 h-7" data-icon="f7:qrcode" data-inline="false"></span>

                <!-- Account Icon -->
                <span class="iconify w-7 h-7" data-icon="line-md:account" data-inline="false"></span>


                <!-- Dropdown Flag Options -->
                <div class="dropdown absolute -bottom-20 right-20 mt-2 w-24 bg-white border border-gray-300 rounded-lg shadow-lg hidden "
                    id="dropFlag">
                    <div class=" flex flex-row gap-1">

                        <img class="w-7 h-7 cursor-pointer p-1  hover:bg-gray-300" id="flagUK"
                            src="http://localhost/php/src/Page/Picture/flag/united_kingdom.png"
                            alt="United Kingdom Flag">
                        <p> english</p>
                    </div>
                    <div class=" flex flex-row gap-1">
                        <img class="w-7 h-7 cursor-pointer p-1  hover:bg-gray-300" id="flagCambodia"
                            src="http://localhost/php/src/Page/Picture/flag/flag_cambodia.png" alt="Cambodia Flag">
                        <p> khmer</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Content Sections -->
        <div class="w-full h-full flex justify-center py-2 ">
            <p>10% off on your first purchase now!</p>
        </div>
        <?php include 'menuBar.php'; ?>

    </div>

    <script>
    // Get elements
    const dropFlag = document.getElementById('dropFlag');
    const dropFlagBtn = document.getElementById('dropFlagBtn');
    const flagUK = document.getElementById('flagUK');
    const flagCambodia = document.getElementById('flagCambodia');

    // Toggle dropdown visibility on flag button click
    dropFlagBtn.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent click event from closing the dropdown immediately
        dropFlag.classList.toggle('hidden');
    });

    // When the UK flag is clicked, switch the button to the UK flag
    flagUK.addEventListener('click', () => {
        dropFlagBtn.src = flagUK.src; // Switch to UK flag
        dropFlag.classList.add('hidden'); // Hide dropdown
    });

    // When the Cambodia flag is clicked, switch the button to the Cambodia flag
    flagCambodia.addEventListener('click', () => {
        dropFlagBtn.src = flagCambodia.src; // Switch to Cambodia flag
        dropFlag.classList.add('hidden'); // Hide dropdown
    });

    // Close the dropdown if clicking outside of it
    document.addEventListener('click', (event) => {
        if (!dropFlag.contains(event.target) && event.target !== dropFlagBtn) {
            dropFlag.classList.add('hidden');
        }
    });
    </script>
</body>

</html>