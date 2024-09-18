<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menubar </title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="../../../../../dist/styles.css" rel="stylesheet">

</head>

<body>
    <div class="w-full h-[50px] bg-primary  flex flex-row px-10">

        <div class=" w-full   h-full flex flex-row  item-center">
            <div class="w-30  h-full  flex flex-row px-4 py-1 hover:bg-primary-100 " id ="clickExpress">

                <div class=" flex flex-col bg-custom-pink font-bold rounded-l-sm    ">
                    <p class=" ">
                        GO
                    </p>
                    <p class="">TO</p>
                </div>
                <img class="w-20 h-full" src="http://localhost/php/src/Page/Picture/menuebar/menuebar.png" alt="">
            </div>

            <div class="w-[60px] h-full flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickNew">
                <h1 class="text-white text-center font-bold text-md tracking-widest">NEW</h1>
            </div>
            <div class="w-[60px] h-full px-10 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickFood">

                <h1 class="text-white text-center font-bold text-md tracking-widest">FOOD</h1>
            </div>
            <div class="w-[60px] h-full px-10 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickDrink">

                <h1 class="text-white text-center font-bold text-md tracking-widest">DRINK</h1>
            </div>
            <div class="w-[200px] h-full px-1 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickHealthAndBeauty">
                <h1 class="text-white text-center font-bold text-md tracking-widest">HEALTH & BEAUTY</h1>
            </div>

            <div class="w-[190px] h-full px-1 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickHomeAndLifeStyle">
                <h1 class="text-white text-center font-bold text-md tracking-widest ">HOME & LIFESTYLE</h1>
            </div>
        </div>
        <!-- brands  -->
        <div
            class="w-[170px] h-[50px] bg-custom-gray hover:bg-custom-gray-90 flex justify-center items-center px-1 py-1">
            <div class="w-full h-full flex justify-center items-center  border ">
                <p
                    class="text-white font-bold text-md border-gray-400 text-center tracking-widest hover:cursor-pointer ">
                    BRAND</p>
            </div>
        </div>

    </div>
    <!-- show new page  -->
    <div class=" hidden " id="newContent">
        <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/new/index.php'; ?>
    </div>

    <!-- show food page  -->
    <div class=" hidden " id="foodContent">
        <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/food/index.php'; ?>
    </div>

    <!-- show drink page  -->
    <div class=" hidden " id="drinkContent">
        <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/drink/index.php'; ?>
    </div>
    <!-- show health and beauty page  -->
    <div class=" hidden " id="healthAndBeautyContent">
        <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/healthAndBeauty/index.php'; ?>
    </div>

    <!-- show home and life style page  -->
    <div class=" hidden " id="homeAndLifeStyleContent">
        <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/homeAndLifeStyle/index.php'; ?>
    </div>
    <!-- show express  page  -->
    <div class=" hidden " id="expressContent">
            <?php include 'C:/xampp/htdocs/php/src/Page/publicSite/homeAndLifeStyle/index.php'; ?>
    </div>

    <!-- for new page srcript -->
    <script>
            // Get elements
            const clickNew = document.getElementById('clickNew');
            const newContent = document.getElementById('newContent');

            // Toggle visibility of newContent on click
            clickNew.addEventListener('click', function() {
                newContent.classList.toggle('hidden');
            });

            // Hide newContent when clicking outside
            document.addEventListener('click', function(event) {
                if (!clickNew.contains(event.target) && !newContent.contains(event.target)) {
                    newContent.classList.add('hidden');
                }
            });
    </script>

    <!-- for food content -->
    <script>
            // Get elements
            const clickFood = document.getElementById('clickFood');
            const foodContent = document.getElementById('foodContent');

            // Toggle visibility of newContent on click
            clickFood.addEventListener('click', function() {
                foodContent.classList.toggle('hidden');
            });

            // Hide newContent when clicking outside
            document.addEventListener('click', function(event) {
                if (!clickFood.contains(event.target) && !foodContent.contains(event.target)) {
                    foodContent.classList.add('hidden');
                }
            });
    </script>


    <!-- for drink content -->
    <script>
            // Get elements
            const clickDrink = document.getElementById('clickDrink');
            const drinkContent = document.getElementById('drinkContent');

            // Toggle visibility of newContent on click
            clickDrink.addEventListener('click', function() {
                drinkContent.classList.toggle('hidden');
            });

            // Hide newContent when clicking outside
            document.addEventListener('click', function(event) {
                if (!clickDrink.contains(event.target) && !drinkContent.contains(event.target)) {
                    drinkContent.classList.add('hidden');
                }
            });
    </script>


    <!-- for health and beauty content -->
    <script>
            // Get elements
            const clickHealthAndBeauty = document.getElementById('clickHealthAndBeauty');
            const healthAndBeautyContent = document.getElementById('healthAndBeautyContent');

            // Toggle visibility of newContent on click
            clickHealthAndBeauty.addEventListener('click', function() {
                healthAndBeautyContent.classList.toggle('hidden');
            });

            // Hide newContent when clicking outside
            document.addEventListener('click', function(event) {
                if (!clickHealthAndBeauty.contains(event.target) && !healthAndBeautyContent.contains(event.target)) {
                    healthAndBeautyContent.classList.add('hidden');
                }
            });
    </script>


    <!-- for home and life style content -->
    <script>
                // Get elements
                const clickHomeAndLifeStyle = document.getElementById('clickHomeAndLifeStyle');
                const homeAndLifeStyleContent = document.getElementById('homeAndLifeStyleContent');

                // Toggle visibility of newContent on click
                clickHomeAndLifeStyle.addEventListener('click', function() {
                    homeAndLifeStyleContent.classList.toggle('hidden');
                });

                // Hide newContent when clicking outside
                document.addEventListener('click', function(event) {
                    if (!clickHomeAndLifeStyle.contains(event.target) && !homeAndLifeStyleContent.contains(event.target)) {
                        homeAndLifeStyleContent.classList.add('hidden');
                    }
                });
    </script>

       <!-- for express content -->
       <script>
    // Get elements
    const clickExpress = document.getElementById('clickExpress');
    const expressContent = document.getElementById('expressContent');

    // Toggle visibility of newContent on click
    clickExpress.addEventListener('click', function() {
        expressContent.classList.toggle('hidden');
    });

    // Hide newContent when clicking outside
    document.addEventListener('click', function(event) {
        if (!clickExpress.contains(event.target) && !expressContent.contains(event.target)) {
            expressContent.classList.add('hidden');
        }
    });
    </script>

</body>

</html>