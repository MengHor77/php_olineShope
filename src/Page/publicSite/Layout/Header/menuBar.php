<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menubar </title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <!-- <link href="../../../../../dist/styles.css" rel="stylesheet"> -->
    <link href="/php/src/dist/styles.css" rel="stylesheet">
</head>

<body>
    <div class="w-full h-[50px] bg-primary  flex flex-row px-10">

        <div class=" w-full   h-full flex flex-row  item-center">
            <div class="w-30  h-full  flex flex-row px-4 py-1 hover:bg-primary-100 " id="clickExpress">

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
                <a href="/php/src/new" class="text-white text-center font-bold text-md tracking-widest">NEW</a>
            </div>
            <div class="w-[60px] h-full px-10 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickFood">

                <a href="/php/src/food" class="text-white text-center font-bold text-md tracking-widest">FOOD</a>
            </div>
            <div class="w-[60px] h-full px-10 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickDrink">

                <a href="/php/src/drink" class="text-white text-center font-bold text-md tracking-widest">DRINK</a>
            </div>
            <div class="w-[200px] h-full px-1 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickHealthAndBeauty">
                <a href="/php/src/health-beauty" class="text-white text-center font-bold text-md tracking-widest">HEALTH
                    & BEAUTY</a>
            </div>

            <div class="w-[190px] h-full px-1 flex justify-center items-center hover:bg-primary-100 cursor-pointer"
                id="clickHomeAndLifeStyle">
                <a href="/php/src/home-life-style" class="text-white text-center font-bold text-md tracking-widest">HOME
                    & LIFESTYLE</a>
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

    <!-- srcript for display new page-->
    <script>
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault(); // Prevent default link behavior

            const url = item.querySelector('a').getAttribute(
            'href'); // Get the href of the clicked item
            history.pushState(null, '', url); // Update the URL in the address bar without reloading

            // Make an AJAX request to fetch the new content
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    // Replace the current content with the new content
                    document.getElementById('content').innerHTML = html;
                })
                .catch(err => console.error(err));
        });
    });
    </script>
</body>

</html>